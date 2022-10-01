<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLecture extends Model
{
    use SoftDeletes;
    protected $table = 'user_lecture';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function user_exercise()
    {
        return $this->hasMany(UserExercise::class, 'user_lecture_id', 'id')->with('exercise')->with('user_exercise_answer');
    }

    
}
