<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolNewsResource;
use App\Models\SchoolInfo;
use App\Models\SchoolNews;
use Illuminate\Http\Request;

class SchoolNewsController extends Controller
{
    public function index(Request $request)
    {
        $school_news = SchoolNews::where('sid', $request->sid);
        return SchoolNewsResource::collection($school_news->paginate(10));
    }
}
