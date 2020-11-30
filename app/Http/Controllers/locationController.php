<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use db;

class locationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
 
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
        $location = new Location;
 
        $location->name = $request->name;
        $location->loc_postcode = $request->loc_postcode;
 
        $location->save();
        
        return response()->json([
            "message" => "location created",
            $location
        ], 201);
    }
    public function show($id)
    {
        if (Location::where('id', $id)->exists()) {
            $location = Location::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($location, 200);
        } else {
            return response()->json([
              "message" => "location not found"
            ], 404);
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        if (Location::where('id', $id)->exists()) {
            $location = Location::find($id);
            $location->name = is_null($request->name) ? $location->name : $request->name;
            $location->loc_postcode = is_null($request->loc_postcode) ? $location->loc_postcode : $request->loc_postcode;
 
            $location->save();
 
            return response()->json([
                "message" => "records updated successfully",
                $location
            ], 200);
        } else{
            return response()->json([
                "message" => "location not found"
            ], 404);
        };
    }
    public function destroy($id)
    {
        if(Location::where('id', $id)->exists()) {
            $location = Location::find($id);
            $location->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Location not found"
            ], 404);
          }
    }
    public function searchLoc(Request $request)
    {
        if ($request->from !="") {
            $locations = Location::where('name','LIKE',"%{$request->from}%")
            ->get();
        }elseif ($request->to !="") {
            $locations = Location::where('name','LIKE',"%{$request->to}%")
            ->get();
        }
        return response()->json($locations);
    }
}
