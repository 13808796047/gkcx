<?php

namespace App\Models;

use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    use Searchable;
    protected $table = 'school_info';

    public function schoolContent()
    {
        return $this->hasOne(SchoolContent::class, 'sid', 'sid');
    }

    public function schoolNews()
    {
        return $this->hasMany(SchoolNews::class, 'sid', 'sid')->take(10);
    }

    public function schoolMajors()
    {
        return $this->hasMany(SchoolMajor::class, 'sid', 'sid')->take(5);
    }

    public function scorelineMajors()
    {
        return $this->hasMany(ScorelineMajor::class, 'sid', 'sid')->take(10);
    }

    public function schoolAsks()
    {
        return $this->hasMany(SchoolAsk::class, 'sid', 'sid');
    }

    public function schoolComments()
    {
        return $this->hasMany(SchoolComment::class, 'sid', 'sid');
    }

    public function scorelineProvs()
    {
        return $this->hasMany(ScorelineProv::class, 'sid', 'sid')->where('year', '2019');
    }
}
