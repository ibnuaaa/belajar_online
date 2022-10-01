<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExercise extends Model
{
    use SoftDeletes;
    protected $table = 'user_excercise';

    public function exercise()
    {
        return $this->hasOne(Exercise::class, 'id', 'excercise_id');
    }

    public function user_exercise_answer()
    {
        return $this->hasOne(UserExerciseAnswer::class, 'user_excercise_id', 'id')->with('exercise_option');
    }
}
