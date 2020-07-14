<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Attachment extends Model
{
    protected $fillable = ['name', 'path'];
}
