<?php
namespace App\Services;

use App\Models\Applicant;
use Carbon\Exceptions\Exception;

class AdmissionService
{
    public function save($data){
      return Applicant::create($data);
    }
    
    public function updateParentInfo($data,$studentid){
      return Applicant::updateOrCreate(['id'=>$studentid],$data);
    }

    protected function saveImage($imageSource,$request){
      $image = $request->file($imageSource);
      $path = $image->store('admission/'.date("Y"), 'public');
      return $path;
    }
    public function uploadDocuments($request){
      try{
        $applicant = Applicant::find($request->id);
        if($applicant == null){
          throw new \Exception('User detail not found');
        }
        if ($request->hasFile('passport')) {
            $applicant->passport = $this->saveImage('passport',$request);
        }
        if ($request->hasFile('birth_certificate')) {
          $applicant->birth_certificate = $this->saveImage('birth_certificate',$request);
        }
        if ($request->hasFile('address_proof')) {
          $applicant->address_proof = $this->saveImage('address_proof',$request);
        }
        $applicant->save();
        return true;
      }catch(Exception $e){
        return false;
      }
    }
}