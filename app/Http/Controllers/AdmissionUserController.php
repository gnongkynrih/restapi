<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionUser;
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
}
