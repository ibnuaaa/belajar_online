<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;
    protected $table = 'exercise';

    public function exercise_option()
    {
        return $this->hasMany(ExerciseOption::class, 'exercise_id', 'id');
    }

}
