<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolContentResource;
use App\Models\SchoolContent;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class SchoolContentController extends Controller
{
    public function index(Request $request)
    {
        $school_content = SchoolContent::where('sid', $request->sid)->first();
        return new SchoolContentResource($school_content);
    }
}
