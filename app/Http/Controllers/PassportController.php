<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use validator;

class PassportController extends Controller
{
    //
    public $successStatus=200;
    public function login(Request $request){
        $user_data=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($user_data)){

            $user = Auth::user();
            $success['token']=$user->createToken('MyApp')->accessToken;
            return response()->json(['success'=>$success],$this->successStatus);

        }else{
            return response()->json(['error'=>'unauthorised'],401);
        }

    }
    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $success['token']=$user->createToken('MyApp')->accessToken;
        $success['name']=$user->name;
            return response()->json(['success'=>$success],$this->successStatus);

    }
    public function getDetails(){

        $user=Auth::user();
        return response()->json(['success'=>$user],$this->successStatus);
    }
}
