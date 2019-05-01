<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = ['Name','Phone','Address'];





     public function patients()
    {
        return $this->belongsToMany(Patient::class,'patient_labs')->withPivot('id','expenses','type','comment','Date','Paymentstatus');
    }
}
