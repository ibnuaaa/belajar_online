<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    protected $table = 'section';

    public function lecture()
    {
        return $this->hasMany(Lecture::class, 'section_id', 'id');
    }
}
