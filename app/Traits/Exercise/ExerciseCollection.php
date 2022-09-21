<?php

namespace App\Traits\Exercise;

/* Models */
use App\Models\Exercise;

use DB;

trait ExerciseCollection
{
    public function __construct()
    {
        $this->ExerciseModel = Exercise::class;
        $this->ExerciseTable = getTable($this->ExerciseModel);
    }

    public function GetExerciseDetails($Exercises)
    {
        $ExerciseID = $Exercises->pluck('id');

        $Exercises->map(function($Exercise) {
            return $Exercise;
        });
        return $Exercises;
    }

}
