<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

trait Searchable
{
    /**
     * 根据 request 参数查询数据
     *
     * @param Request $request
     * @param array $keywordFields 关键字匹配的字段
     * @param array $excepts 查询时要排除的字段
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function scopeSearch(Builder $builder, Request $request, array $keywordFields = [], array $excepts = []): Builder
    {
        // $builder = (new \ReflectionClass(static::class))->newInstance()->query();
        foreach($request->except(array_merge([
            'page', 'per_page', /** 分页 */
            'orderBy', 'orderFlag', /** 排序 */
            'keywords', /** 查询关键字 */
            'dateType', 'dateRange',/** 时间段过滤 */
        ], $excepts)) as $field => $search) {
            if(is_array($search)) {
                $builder->whereIn($field, $search);
            } else {
                $builder->where($field, $search);
            }
        }
        if($dateRange = $request->dateRange) {
            /** 时间段过滤 */
            $builder->whereBetween($request->input('dateType', 'created_at'), [
                Carbon::parse($dateRange[0])->startOfDay(),
                Carbon::parse($dateRange[1])->endOfDay(),
            ]);
        }
        if(count($keywordFields)) {
            /** 查询关键字 */
            $builder->when($keywords = $request->keywords, function($query) use ($keywords, $keywordFields) {
                $query->where(
                    function($query) use ($keywords, $keywordFields) {
                        foreach($keywordFields as $f) {
                            $query->orWhere($f, 'like', "%$keywords%");
                        }
                    }
                );
            });
        }
        if($orderFlag = $request->orderFlag) {
            /** 排序 */
            $builder->orderBy($request->input('orderBy', 'id'), strpos($orderFlag, 'desc') === 0 ? 'desc' : 'asc');
        } else {
            $builder->latest('id');
        }
        return $builder;
    }

}
