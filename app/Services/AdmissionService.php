<?php
namespace App\Services;

use App\Models\Applicant;

class AdmissionService
{
    public function save($data){
      return Applicant::create($data);
    }
}