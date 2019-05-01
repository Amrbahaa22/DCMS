<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientLab extends Model
{
       protected $fillable=['patient_id','lab_id','expenses','type','comment','Date','Paymentstatus'];
}
