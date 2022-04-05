<?php

namespace App\Models;

use App\Models\DOCTOR;
use App\Models\PATIENT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APPOINTMENT extends Model
{

    protected $table="appointment";
    public $timestamps=false;
    use HasFactory;

    public function Doctor(){
        return $this->belongsTo(DOCTOR::class, 'DOCTOR_ID', 'ID');
    }
    
    public function Patient(){
        return $this->belongsTO(PATIENT::class,'PATIENT_ID', 'ID');
    }

}
