<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\AdmissionUser;
use App\Services\AdmissionService;
use App\Http\Requests\PersonalInfoFormRequest;

class AdmissionApplicationController extends Controller
{
    protected $admissionService;
    public function __construct(AdmissionService $service){
        $this->admissionService = $service;
    }

    public function personal(PersonalInfoFormRequest $request){
        //insert in to table applicants all the values
        // that has been validated by personalinfoformrequest
        try{
           
            $userExist = AdmissionUser::checkUserExist($request->admission_user_id);
            if($userExist == false ){
                return response()->json([
                    'message'=>'User does not exist'
                ],404);
            }
            $check = Applicant::checkIfAlreadyApplied(
                $request->admission_user_id,
                $request->first_name,
                $request->class_name
            );
            if($check ==true){
                return response()->json([
                    'message'=>'You have already applied for this class'
                ],404);
            }
            $applicant =$this->admissionService->save($request->validated());
            return response()->json([
                'data'=>$applicant->admission_user_id,
                'message'=>'Applicant created'
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Applicant cannot be created'
            ],404);
        }
    }
}
