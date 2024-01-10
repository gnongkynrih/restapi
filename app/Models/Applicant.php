<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    static public function checkIfAlreadyApplied($userid,$name,$cls): bool{
      //select * from applicants where admission_uiser_id=$userid 
      // and first_name = $name and class_name = $cls

        $applicant = Applicant::where('admission_user_id','=',$userid)
        ->where('first_name','=',$name)->where('class_name','=',$cls)->first();
        if($applicant){
            return true;
        }else{
            return false;
        }
    }
    
}
