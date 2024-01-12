<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReligionResource;
use App\Http\Requests\CreateReligionRequest;

class ReligionController extends Controller
{
    public function select($id){
        //select * from religion where id = $id
        $religion = Religion::find($id);
        if($religion == null)
            return response()->json([
                "data" => "No records found"
            ], 404);
        else
            return response()->json([
                "data" => new ReligionResource($religion), 
            ], 201);
    }
    public function index(){
        //select * from religion
        $religion = Religion::all();
        if($religion->isEmpty())
            return response()->json([
                "data" => "No records found"
            ], 404);
        else
            return response()->json([
                "data" => ReligionResource::collection($religion), 
            ], 201);
    }
    public function store(CreateReligionRequest $req)
    {
        try{
            $religion = new Religion();
            $religion->name = $req->name;
            $religion->save();
            return response()->json([
                "data" => $religion, 
                "message" => "Religion record created"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "Religion record not created"
            ], 500);
        }
    }
    public function edit(Request $request,Religion $religion)
    {
        try{
            $religion->name = $request->name;
            $religion->save();
            return response()->json([
                "data" => $religion->name, 
                "message" => "Record updated successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "Religion record not updated"
            ], 404);
        }
    }  
    public function delete(Religion $religion)
    {
        try{
            $religion->delete();
            return response()->json([
                "message" => "Record deleted successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "Religion record not deleted"
            ], 404);
        }
    }
    
}
