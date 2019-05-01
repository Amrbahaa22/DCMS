<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','age','address' ,'cellphone','telephone','job' ,'doctorName','attendance','SubmitDate','NextAppointment','MedicalHistory','DentalHistory','ChiefComplain'];



    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    

    public function labs()
    {
        return $this->belongsToMany(Lab::class, 'patient_labs');
    }
}
