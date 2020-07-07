<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolMajor extends Model
{
    protected $table = 'school_major';

    public function schoolInfo()
    {
        return $this->belongsTo(SchoolInfo::class);
    }
}
