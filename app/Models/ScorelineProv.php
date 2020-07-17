<?php

namespace App\Models;

use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class ScorelineProv extends Model
{
    use Searchable;
    protected $table = 'scoreline_prov';
}
