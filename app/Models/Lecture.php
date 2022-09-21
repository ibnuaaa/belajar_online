<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use SoftDeletes;
    protected $table = 'lecture';

    public function exercise()
    {
        return $this->hasMany(Exercise::class, 'lecture_id', 'id')->with('exercise_option');
    }

}
