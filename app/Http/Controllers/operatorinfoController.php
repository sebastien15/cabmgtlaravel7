<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operatorinfo;
use db;

class operatorinfoController extends Controller
{
    public function index()
    {
        $locations = Operatorinfo::all();
 
        return response()->json(
            $locations
        );
    }
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $upload_path = public_path('upload');
        $file_name = $request->profile_pic->getClientOriginalName();
        $generated_new_name = time() . '.' . $request->profile_pic->getClientOriginalExtension();
        $request->profile_pic->move($upload_path, $generated_new_name);

        $Operatorinfo = new Operatorinfo;   
 
        $Operatorinfo->operator_id  = $request->operator_id;
        $Operatorinfo->phone        = $request->phone;
        $Operatorinfo->number_plate = $request->number_plate;
        $Operatorinfo->profile_pic  = $generated_new_name;
        $Operatorinfo->company_name = $request->company_name;
        $Operatorinfo->car_id       = $request->car_id;
 
        $Operatorinfo->save();
        
        return response()->json([
            "message" => "Operatorinfo created",
            $Operatorinfo
        ], 201);
    }
    public function show($id)
    {
        if (Operatorinfo::where('operator_id', $id)->exists()) {
            $Operatorinfo = Operatorinfo::where('operator_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Operatorinfo, 200);
        } else {
            return response()->json([
              "message" => "Operatorinfo not found"
            ], 404);
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        if (Operatorinfo::where('id', $id)->exists()) {
            $Operatorinfo = Operatorinfo::find($id);
            $Operatorinfo->operator_id = is_null($request->operator_id) ? $Operatorinfo->operator_id : $request->operator_id;
            $Operatorinfo->phone = is_null($request->phone) ? $Operatorinfo->phone : $request->phone;
            $Operatorinfo->company_name = is_null($request->company_name) ? $Operatorinfo->company_name : $request->company_name;
            $Operatorinfo->car_id = is_null($request->car_id) ? $Operatorinfo->car_id : $request->car_id;
 
            $Operatorinfo->save();
 
            return response()->json([
                "message" => "records updated successfully",
                $Operatorinfo
            ], 200);
        } else{
            return response()->json([
                "message" => "Operatorinfo not found"
            ], 404);
        };
    }
    public function destroy($id)
    {
        if(Operatorinfo::where('id', $id)->exists()) {
            $Operatorinfo = Operatorinfo::find($id);
            $Operatorinfo->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Operatorinfo not found"
            ], 404);
          }
    }
}
