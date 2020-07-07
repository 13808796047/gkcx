<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolNews extends Model
{
    protected $table = 'school_news';

    public function schoolInfo()
    {
        return $this->belongsTo(SchoolInfo::class, 'sid');
    }
}
