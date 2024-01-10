<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    static public function checkUserExist($id){
        $user = AdmissionUser::find($id);
        if($user){
            return true;
        }else{
            return false;
        }
    }
}
