<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolMajorResource;
use App\Models\SchoolInfo;
use App\Models\SchoolMajor;
use Illuminate\Http\Request;

class SchoolMajorController extends Controller
{
    public function index(Request $request)
    {
        $school_majors = SchoolMajor::where('sid', $request->sid);
        return SchoolMajorResource::collection($school_majors->get());
    }
}
