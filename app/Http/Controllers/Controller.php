<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function insert(Request $request)
    {
        try{
            $religion = new Religion();
            $religion->name = $request->name;
            $religion->save();
            return response()->json([
                "data" => $religion, 
                "message" => "Religion record created"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "Religion record not created"
            ], 404);
        }
    }
}
