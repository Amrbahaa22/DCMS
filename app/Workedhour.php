<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workedhour extends Model
{
    protected $fillable=['user_id','name','Date','workhours'];
}
