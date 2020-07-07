<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolAskResource;
use App\Models\SchoolAsk;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class SchoolAskController extends Controller
{
    public function index(Request $request)
    {
        $school_ask = SchoolAsk::where('sid', $request->sid)->get();
        return new SchoolAskResource($school_ask);
    }
}
