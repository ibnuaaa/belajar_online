<?php

namespace App\Traits\UserLecture;

/* Models */
use App\Models\UserLecture;

use DB;

trait UserLectureCollection
{
    public function __construct()
    {
        $this->UserLectureModel = UserLecture::class;
        $this->UserLectureTable = getTable($this->UserLectureModel);
    }

    public function GetUserLectureDetails($UserLectures)
    {
        $UserLectureID = $UserLectures->pluck('id');

        $UserLectures->map(function($UserLecture) {
            return $UserLecture;
        });
        return $UserLectures;
    }

}
