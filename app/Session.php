<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
        protected $fillable = ['patient_id','Date','Procedure' ,'TotalFee','Paid' ,'status','Remaining'];



    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
