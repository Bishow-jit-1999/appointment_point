<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PATIENT extends Model
{
    use HasFactory;
    
    protected $table="patients";
    public $timestamps=false;


    public function appointmentPAT(){
        return $this->hasMany(APPOINTMENT::class,'PATIENT_ID');
    }
}
