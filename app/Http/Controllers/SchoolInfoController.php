<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolInfoResource;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class SchoolInfoController extends Controller
{
    public function index(Request $request)
    {
        $data = SchoolInfo::search($request);
        return SchoolInfoResource::collection($data->paginate());
    }

    public function show(SchoolInfo $school)
    {
        return new SchoolInfoResource($school->loadMissing('schoolNews', 'schoolMajors', 'scorelineMajors', 'schoolContent', 'schoolComments', 'scorelineProvs'));
    }
}
