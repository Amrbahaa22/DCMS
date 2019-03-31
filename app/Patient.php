<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
   protected $fillable = [
        'name','age', 'address','cell phone','telephone','job', 'doctorName','SubmitDate','Next Appointment',
    ];
}
