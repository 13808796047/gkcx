<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolAsk extends Model
{
    protected $table = 'school_ask';

    public function schoolInfo()
    {
        return $this->belongsTo(SchoolInfo::class);
    }
}
