<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PATIENT;
use App\Models\UserModel;
use App\Models\DOCTOR;
use App\Models\APPOINTMENT;
use App\Models\Token;

class PatientController extends Controller
{

    public function home(){
        return view('patient.patientDash');
    }

    public function reg_patient(){
        return view('patient.regpatient');
    }

    public function reg_patient_submit(Request $req){
        // $validate=$req->validate([
        //     'PatName'=>'required',
        //     'PatientContact'=>'required',
        //     'PatientEmail'=>'required',
        //     'PatientDOB'=>'required',
        //     'PatientUserName'=>'required',
        //     'PatientPassword'=>'required'
        // ]);

  
            $patients=new PATIENT();
            $patients->NAME=$req->PatName;
            $patients->CONTACT=$req->PatContact;
            $patients->EMAIL=$req->PatEmail;
            $patients->DOB=$req->PatDOB;
            $patients->USERNAME=$req->PatUserName;
            $patients->PASSWORD=$req->PatPassword;
            $patients->save();

            $users=new UserMODEL();
            $users->USERNAME=$req->PatUserName;
            $users->PASSWORD=md5($req->PatPassword);
            $users->TYPE=$req->Dtype;
            $users->save();
             
            // echo '<script>alert("Account Created Successfully")</script>';
            // return view('loginpage');

            $user = UserModel::where('USERNAME', $req->PatUserName)->first();

            $token = new Token();
            $token->user_id = $user->ID;
            $token->user_type = $req->Dtype;
            $token->user_name = $req->PatUserName;
            $token->token = Str::random(64);
            
            if($token->save()){
                return response()->json([
                    "token"=> $token,
                    "msg"=>"Registration Successful"

                ]);
            }
            else{
                return response()->json([
                    "message" => "Server problem occured"
                ]);
            }

       }

        public function view_doctor(){
        $doctors=DOCTOR::all();
        return response()->json([
            "doctors"=>$doctors
        ],200);
    }

       public function appointmentTime(Request $req){
           $id=$req->id;

           $doc=DOCTOR::where("ID",$id)->first();

          return $doc;

       } 

       public function appointmentTimeSubmit(Request $req){
          //$username=$req->session()->get('user');
        $token=Token::where('token',$req->header('token'))->first();
        $user_name=$token->user_name;
        $patient=PATIENT::where('USERNAME',$user_name)->first();
        $p_id=$patient->ID;

       

          $var=new APPOINTMENT();
          $var->PATIENT_ID=$p_id;
          $var->DOCTOR_ID=$req->ID;
          $var->DATE=$req->date;
          $var->TIME=$req->time;
          $var->STATUS=$req->Status;

          $var->save();

        

         // echo '<script>alert("Appointment has been booked successfully")</script>';

          //return view('patient.patientDash');

       }

       public function myprofile(Request $req){

        //$username=$req->session()->get('user');
        $token=Token::where('token',$req->header('token'))->first();
        $user_name=$token->user_name;
        $patient=PATIENT::where('USERNAME',$user_name)->first();
        $c=$patient->ID;
        $appoint=APPOINTMENT::Where('PATIENT_ID',$c)->where('STATUS',"Appointed")->count();
        $appoint_past=APPOINTMENT::Where('PATIENT_ID',$c)->where('STATUS',"VISITED")->count();

       
        //return view('patient.myprofile')->with(['patient'=>$patient,'appoint'=>$appoint,'appoint_past'=>$appoint_past]);
        
        return response()->json([
            "patient"=>$patient,
            "appoint"=>$appoint,
            "appoint_past"=>$appoint_past
        ],200);
       }

      

       public function myappoint(Request $req){
          //$username=$req->session()->get('user');
          $token=Token::where('token',$req->header('token'))->first();
          $user_name=$token->user_name;
          $patient=PATIENT::where('USERNAME',$user_name)->first();
          $pat_id=$patient->ID;
          $appoint=APPOINTMENT::Where('PATIENT_ID',$pat_id)->with('Doctor')->with('Patient')->get();

          return response()->json([ 
              "appointment" => $appoint,

          ],200);
        }  

}
