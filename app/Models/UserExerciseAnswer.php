<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExerciseAnswer extends Model
{
    use SoftDeletes;
    protected $table = 'user_excercise_answer';

    public function exercise_option()
    {
        return $this->hasOne(ExerciseOption::class, 'id', 'excercise_option_id');
    }
}
