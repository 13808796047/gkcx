<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolInfoResource;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class SchoolInfoController extends Controller
{
    public function index(Request $request)
    {
        return SchoolInfoResource::collection(SchoolInfo::paginate());
    }
}
