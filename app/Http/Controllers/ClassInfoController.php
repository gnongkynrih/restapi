<?php

namespace App\Http\Controllers;

use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Http\Requests\ClassInfoRequest;

class ClassInfoController extends Controller
{
    public function index(){
            $classInfo = ClassInfo::where('is_active','=','Y')->get();
            if($classInfo->isEmpty())
                return response()->json([
                    "data" => "No records found"
                ], 404);
            else
                return response()->json([
                    "data" => $classInfo, 
                ], 201);
        
    }
    public function create(ClassInfoRequest $request){
        try{
            $classInfo = new ClassInfo();
            $classInfo->name = $request->name;
            $classInfo->save();
            return response()->json([
                "data" => $classInfo, 
                "message" => "ClassInfo record created"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "ClassInfo record not created"
            ], 404);
        }
    }
    public function edit(Request $request,ClassInfo $classInfo)
    {
        try{
            
            $classInfo->name = $request->name;
            $classInfo->is_active='Y';
            $classInfo->save();
            return response()->json([
                "data" => $classInfo->name, 
                "message" => "Record updated successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "ClassInfo record not updated"
            ], 404);
        }
    }
    public function delete(ClassInfo $clsinfo)
    {
        try{
            
            $clsinfo->is_active='N';
            $clsinfo->save();
            return response()->json([
                "message" => "Record deleted successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "ClassInfo record not deleted"
            ], 404);
        }
    }
}
