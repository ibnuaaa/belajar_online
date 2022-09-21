<?php

namespace App\Traits\Course;

/* Models */
use App\Models\Course;

use DB;

trait CourseCollection
{
    public function __construct()
    {
        $this->CourseModel = Course::class;
        $this->CourseTable = getTable($this->CourseModel);
    }

    public function GetCourseDetails($Courses)
    {
        $CourseID = $Courses->pluck('id');

        $Courses->map(function($Course) {
            return $Course;
        });
        return $Courses;
    }

}
