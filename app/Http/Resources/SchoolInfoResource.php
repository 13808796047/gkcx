<?php

namespace App\Http\Resources;

use App\Http\Controllers\ScorelineMajorController;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['school_news'] = SchoolNewsResource::collection($this->whenLoaded('schoolNews'));
        $data['school_majors'] = SchoolMajorResource::collection($this->whenLoaded('schoolMajors'));
        $data['scoreline_majors'] = ScorelineMajorResource::collection($this->whenLoaded('scorelineMajors'));
        $data['school_content'] = new SchoolContentResource($this->whenLoaded('schoolContent'));
        $data['school_comments'] = new SchoolCommentResource($this->whenLoaded('schoolComments'));
        $data['scoreline_provs'] = ScorelineProvResource::collection($this->whenLoaded('scorelineProvs'));
        return $data;
    }
}
