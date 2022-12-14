<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseOption extends Model
{
    use SoftDeletes;
    protected $table = 'exercise_options';

    public function exercise()
    {
        return $this->hasOne(Exercise::class, 'id', 'exercise_id')->with('lecture');
    }

}
