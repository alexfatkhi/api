<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progdi extends Model
{
    use SoftDeletes;

    protected $table = 'progdi';
    protected $guarded = ['id'];
}
