<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScorelineProvResource;
use App\Models\ScorelineProv;
use Illuminate\Http\Request;

class ScorelineProvController extends Controller
{
    public function index(Request $request)
    {
        $data = ScorelineProv::where('sid', $request->sid)->search($request);
        return ScorelineProvResource::collection($data->paginate(10));
    }
}
