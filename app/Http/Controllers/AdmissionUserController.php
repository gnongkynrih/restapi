<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionUser;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\RegisterUserRequest;

class AdmissionUserController extends Controller
{
    public function register(RegisterUserRequest $request){
        try{
            $user = new AdmissionUser();
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'data'=>new RegisterResource($user),
                'message'=>'User created'
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'User cannot be created'
            ],404);
        }
    }
    public function login(LoginRequest $request){
        try{
            //select * from admission_users where mobile = $request->mobile
            // limit 1
            $user = AdmissionUser::where('mobile',$request->mobile)->first();
            if($user){
                if(Hash::check($request->password,$user->password)){
                    return response()->json([
                        'data'=>new RegisterResource($user),
                        'message'=>'User logged in'
                    ],200);
                }else{
                    return response()->json([
                        'message'=>'Incorrect user credential'
                    ],404);
                }
            }else{
                return response()->json([
                    'message'=>'Incorrect user credential'
                ],404);
            }
        }catch(Exception $e){
            return response()->json([
                'message'=>'User cannot be logged in'
            ],404);
        }
    }
}
