<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UserModel;
use App\Models\Token;

class UserController extends Controller
{

    public function HOME(){
        return view('welcome');
    }
    public function login(){
        return view('loginpage');
    }

    public function loginSubmit(Request $req){
        // $validate=$req->validate([
        //     'username'=>'required',
        //     'password'=>'required'
        // ]);
        $username=$req->username;
        $pass=md5($req->password);
    
        $user=UserModel::where('USERNAME',$username)->where('PASSWORD',$pass)->first();

        if($user){

            $type=$user->TYPE;
            $token = new Token();
            $token->user_id = $user->ID;
            $token->user_type = $type;
            $token->user_name = $user->USERNAME;
            $token->token = Str::random(64);
            
            if($token->save()){
                return response()->json([
                    "token"=> $token
                ]);
            }
            else{
                return response()->json([
                    "message" => "Server problem occured"
                ]);
            }
            
            
        }
        else{
            return response()->json([
                "message"=> "Invalid credentials"
            ], 401);
        }

    }

    public function logout(Request $req){
        $token = Token::where('token', $req->header('token'))->where('expired', false)->first();
        $token->expired = true;
        if($token->save()){
            return response()->json([
                "message"=> "Logout"
            ]);
        }
    }
}
