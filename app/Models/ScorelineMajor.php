<?php

namespace App\Models;

use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class ScorelineMajor extends Model
{
    use Searchable;
    protected $table = 'scoreline_major';

    public function schoolInfo()
    {
        return $this->belongsTo(SchoolInfo::class);
    }
}
