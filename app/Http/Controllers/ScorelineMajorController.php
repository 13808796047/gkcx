<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScorelineMajorResource;
use App\Models\SchoolInfo;
use App\Models\ScorelineMajor;
use Illuminate\Http\Request;

class ScorelineMajorController extends Controller
{
    public function index(Request $request)
    {
        $builder = ScorelineMajor::where('sid', $request->sid)->search($request);
        return ScorelineMajorResource::collection($builder->paginate(10));
    }
}
