<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scheduler;
use db;

class schedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedulers = Scheduler::all();
 
        return response()->json(
            $schedulers
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scheduler = new Scheduler;
 
        $scheduler->car_id            = $request->car_id;
        $scheduler->route_from        = $request->route_from;
        $scheduler->route_to          = $request->route_to;
        $scheduler->departure_time    = $request->departure_time;
        $scheduler->arrival_time      = $request->arrival_time;
        $scheduler->journey_time      = $request->journey_time;
        $scheduler->message           = $request->message;
 
        $scheduler->save();
        
        return response()->json([
            "message" => "scheduler created Successfully",
            $scheduler
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Scheduler::where('id', $id)->exists()) {
            $scheduler = Scheduler::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($scheduler, 200);
        } else {
            return response()->json([
              "message" => "scheduler not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        'car_id', 
        'route_from', 
        'route_to', 
        'departure_time', 
        'arrival_time',
        'journey_time',
        'message'

        if (Scheduler::where('id', $id)->exists()) {

            $scheduler                   = Scheduler::find($id);

            $scheduler->car_id            = is_null($request->car_id) ? $scheduler->car_id : $request->car_id;
            $scheduler->route_from        = is_null($request->route_from) ? $scheduler->route_from : $request->route_from;
            $scheduler->route_to          = is_null($request->route_to) ? $scheduler->route_to : $request->route_to;
            $scheduler->departure_time    = is_null($request->departure_time) ? $scheduler->departure_time : $request->departure_time;
            $scheduler->arrival_time      = is_null($request->arrival_time) ? $scheduler->arrival_time : $request->arrival_time;
            $scheduler->journey_time      = is_null($request->journey_time) ? $scheduler->journey_time : $request->journey_time;
            $scheduler->message           = is_null($request->message) ? $scheduler->message : $request->message;
 
            $scheduler->save();
 
            return response()->json([
                "message" => "schedulers updated successfully",
                $scheduler
            ], 200);
        } else{
            return response()->json([
                "message" => "scheduler not found"
            ], 404);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Scheduler::where('id', $id)->exists()) {
            $scheduler = Scheduler::find($id);
            $scheduler->delete();
    
            return response()->json([
              "message" => "$scheduler deleted"
            ], 202);
        } else {
            return response()->json([
              "message" => "$scheduler not found"
            ], 404);
        }
    }
}
