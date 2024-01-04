<?php

namespace App\Http\Controllers\Api;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReligionController extends Controller
{
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
