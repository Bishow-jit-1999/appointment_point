<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\DOCTOR;
use App\Models\APPOINTMENT;
use App\Models\Token;


use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function home(){
        return view('doctor.doctorDash');
    }
    
    public function myprofile(Request $req){

        //$username=$req->session()->get('user');
        $token=Token::where('token',$req->header('token'))->first();
        $user_name=$token->user_name;
        $doctor=DOCTOR::where('USERNAME',$user_name)->first();

        $d=$doctor->ID;
        $appoint=APPOINTMENT::Where('DOCTOR_ID',$d)->where('STATUS',"Appointed")->count();
        $appoint_past=APPOINTMENT::Where('DOCTOR_ID',$d)->where('STATUS',"VISITED")->count();

        //return view('doctor.Myprofile')->with(['doctor'=>$doctor,'appoint'=>$appoint,'appoint_past'=>$appoint_past]);

        return response()->json([
            "doctor"=>$doctor,
            "appoint"=>$appoint,
            "appoint_past"=>$appoint_past,
        ],200);

        return $appoint_past;

       }

    public function myappoint(Request $req){
        // $username=$req->session()->get('user');
        $token=Token::where('token',$req->header('token'))->first();
        $user_name=$token->user_name;
        $doctor=DOCTOR::where('USERNAME', $user_name)->first();
        $doc_id=$doctor->ID;
        $appoint=APPOINTMENT::Where('DOCTOR_ID',$doc_id)->with('Doctor')->with('Patient')->get();

        
        // return $doctor;
        // return json($appoint, 200);
        return response()->json([
            "appointment"=> $appoint,
            // "doctor"=> $doctor
        ], 200);
        
        
     }

     public function update_stat_doc(Request $req){
        $id=$req->id;
        $stat=array('STATUS'=>'VISITED');
        APPOINTMENT::where('ID',$id)->update($stat);

        return response()->json([
            'msg'=> "Appointment done"
        ]);
    }



     
}

