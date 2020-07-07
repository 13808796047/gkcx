<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolContent extends Model
{
    protected $table = 'school_content';

    public function SchoolInfo()
    {
        return $this->belongsTo(SchoolInfo::class);
    }
}
