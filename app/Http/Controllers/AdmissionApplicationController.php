<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\AdmissionUser;
use App\Services\UtilityService;
use App\Services\AdmissionService;
use App\Http\Requests\ParentInfoRequest;
use App\Http\Requests\PersonalInfoFormRequest;

class AdmissionApplicationController extends Controller
{
    protected $admissionService;
    protected $utilService;
    public function __construct(
        AdmissionService $service,
        UtilityService $utilService){
        $this->admissionService = $service;
        $this->utilService = $utilService;
    }

    public function personal(PersonalInfoFormRequest $request){
        dd($request->all());
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
                return $this->utilService->jsonResponse(
                    null,
                    'You have already applied for this class',
                    404
                );
                
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

    public function parentsInfo(ParentInfoRequest $request){
        $userExist = AdmissionUser::checkUserExist($request->admission_user_id);
        if($userExist == false ){
            return response()->json([
                'message'=>'User does not exist'
            ],404);
        }
        $applicant =$this->admissionService->updateParentInfo($request->validated(),$request->student_id);
        return response()->json([
            'data'=>$applicant,
            'message'=>'record updated'
        ],201);
    }
    public function uploadDocuments(Request $request){
        try{
            $res = $this->admissionService->uploadDocuments($request);
            return response()->json([
                'data'=>$res,
                'message'=>'Documents uploaded'
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
            ],404);
        }
    }
}
