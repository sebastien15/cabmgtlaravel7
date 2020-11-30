<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use db;

class stationController extends Controller
{
    public function index()
    {
        $stations = Station::all();
 
        return response()->json(
            $stations
        );

    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $station = new Station;
        $this->validate($request, [
            'route_id'=>'required',
            'from'=>'required',
            'to'=>'required',
            'time'=>'required',
        ]);
        
        $station->route_id = $request->route_id;
        $station->from = $request->from;
        $station->to = $request->to;
        $station->from_postcode = $request->from_postcode;
        $station->to_postcode = $request->to_postcode;
        $station->price = $request->price;
        $station->kilometers = $request->kilometers;
        $station->time = $request->time;
 
        $station->save();
        
        return response()->json([
            "message" => "station created",
            $station
        ], 201);
    }
    public function show($id)
    {
        if (Station::where('id', $id)->exists()) {
            $station = Station::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($station, 200);
          } else {
            return response()->json([
              "message" => "station not found"
            ], 404);
          }
    }
    public function edit($id)
    {
        //
    }
    public function findByRouteId($id)
    {
        if (Station::where('route_id', $id)->exists()) {
            $stations = Station::where('route_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($stations, 200);
        } else {
            return response()->json([
              "message" => "station not found"
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        if (Station::where('id', $id)->exists()) {
            $station = Station::find($id);
            
            $station->route_id = is_null($request->route_id) ? $station->route_id : $request->route_id;
            $station->from = is_null($request->from) ? $station->from : $request->from;
            $station->to = is_null($request->to) ? $station->to : $request->to;
            $station->from_postcode = is_null($request->from_postcode) ? $station->from_postcode : $request->from_postcode;
            $station->to_postcode = is_null($request->to_postcode) ? $station->to_postcode : $request->to_postcode;
            $station->price = is_null($request->price) ? $station->price : $request->price;
            $station->kilometers = is_null($request->kilometers) ? $station->kilometers : $request->kilometers;
            $station->time = is_null($request->time) ? $station->time : $request->time;
 
            $station->save();
 
            return response()->json([
                "message" => "records updated successfully",
                $station
            ], 200);
        } else{
            return response()->json([
                "message" => "station not found"
            ], 404);
        };
    }
    public function destroy($id)
    {
        if(Station::where('id', $id)->exists()) {
            $station = Station::find($id);
            $station->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "station not found"
            ], 404);
          }

    }
    public function destroyByRouteId($id)
    {
        if(Station::where('route_id', $id)->exists()) {
            $stations = Station::where('route_id', $id)->delete();      
    
            return response()->json([
              "message" => "stations deleted",
            ], 202);
          } else {
            return response()->json([
              "message" => "station not found"
            ], 404);
          }

    }

    public function searchStation(Request $request)
    {
        $stations = Station::where('from','LIKE',"%{$request->keywords}%")
        ->orWhere('to','LIKE',"%{$request->keywords}%")
        ->orWhere('from_postcode','LIKE',"%{$request->keywords}%")
        ->orWhere('to_postcode','LIKE',"%{$request->keywords}%")
        ->get();
        return response()->json($stations);
    }
}
