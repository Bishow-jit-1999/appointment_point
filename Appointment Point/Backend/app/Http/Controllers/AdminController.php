<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\DOCTOR;
use App\Models\UserModel;
use App\Models\PATIENT;
use App\Models\APPOINTMENT;
use APP\Models\Token;

class AdminController extends Controller
{

   public function home(){
       return view('admin.adminDash');
   }

    public function docreg(){
        return view('doctor.register');
    }

    public function docregSubmit(Request $req){
        

        $var=new DOCTOR();
        $var->NAME=$req->DoctorName;
        $var->USERNAME=$req->DoctorUserName;
        $var->PASSWORD=$req->DoctorPassword;
        $var->EMAIL=$req->DoctorEmail;
        $var->CONTACT=$req->DoctorContact;
        $var->DEPT=$req->DoctorDepartment;
        $var->save();

        $user=new UserModel();
        $user->USERNAME=$req->DoctorUserName;
        $user->PASSWORD=md5($req->DoctorPassword);
        $user->TYPE=$req->Dtype;
        $user->save();

        // $user = UserModel::where('USERNAME', $req->PatUserName)->first();

        //     $token = new Token();
        //     $token->user_id = $user->ID;
        //     $token->user_type = $req->Dtype;
        //     $token->user_name = $req->PatUserName;
        //     $token->token = Str::random(64);
        //     $token->save();
       
        return response()->json([
            "msg"=> "Doctor added"
        ]);
    }

    public function view_doctor(){
        $doctors=DOCTOR::all();
        $count_doc=DOCTOR::all()->count();

        //return $doctors;
        return response()->json([
            'doctors'=>$doctors,
            'count_doc'=>$count_doc
        ]);
    }

    public function view_patient(){
        $patients=PATIENT::all();
        $count_pat=PATIENT::all()->count();
        return response()->json([
            'patients'=>$patients,
            'count_pat'=>$count_pat
        ]);

    }
    
    public function delete_doc(Request $req){
        $id = $req->id;

        APPOINTMENT::where('DOCTOR_ID', $id)->delete();
        $doc=DOCTOR::where('ID',$id)->first();
        UserModel::where("USERNAME",$doc->USERNAME)->delete();
        DOCTOR::where('ID',$id)->delete();
        

        return response()->json([
            "msg"=> "Doctor deleted"
        ]);

    }

    public function getSingleDoctor(Request $req){
        $doctor = Doctor::where('ID', $req->id)->first();
        return response()->json([
            'doctor'=> $doctor
        ]);
    }

    public function edit_doc(Request $req){
        $id=$req->id;


        $doctor=DOCTOR::Where('ID',$id)->first(); 
        return $doctor;


    }

    public function edit_doc_submit(Request $req){

        $data=array( 'NAME'=>$req->DoctorName,'EMAIL'=>$req->DoctorEmail,'CONTACT'=>$req->DoctorContact,'DEPT'=>$req->DoctorDepartment);
     
        DOCTOR::where('ID',$req->ID)->update($data);

        

        
       // return redirect()->route('admin.doctor.view');
    }

    public function myappoint(){
       
        $appoint=APPOINTMENT::with('Doctor')->with('Patient')->get();
        $app_count=APPOINTMENT::all()->count();
        // $Doctor=DOCTOR::where('ID',$appoint->DOCTOR_ID)->get();
        // $Patient=PATIENT::where('ID',$appoint->PATIENT_ID)->get();

        //return $appoint;
        return response()->json([
            "appointment"=> $appoint,
            "app_count"=>$app_count
            //"Doctor"=>$Doctor,
           // "Patient"=>$Patient

        ]);
      
    }

    public function report(Request $req){
        $doc=DOCTOR::with('appointments')->get();
        // $count_app=APPOINTMENT::where('DOCTOR_ID',$doc->ID)->count();

        return response()->json([
            'doc'=>$doc
            // 'count_app'=>$count_app
        ]);
    }

    public function update_stat(Request $req){
        $id=$req->id;
        $stat=array('STATUS'=>'VISITED');
        APPOINTMENT::where('ID',$id)->update($stat);

        return response()->json([
            'msg'=> "Appointment done"
        ]);
    }


  
}
