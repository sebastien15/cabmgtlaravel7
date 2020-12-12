<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scheduler;
use db;
use Carbon\Carbon;

class schedulerController extends Controller
{

    public function index()
    {
        $schedulers = Scheduler::all();
 
        return response()->json(
            $schedulers
        );
    }
    public function getTodaysScheduler()
    {
        $current = new Carbon;
        $schedulers = Scheduler::where('journey_date', $current->format('Y-m-d'))->get();
        // $schedulers = Scheduler::where('where', )->get();
        
        return response()->json([
            $schedulers
        ], 201);
    }
    public function querySchedulers(Request $request)
    {
        $validatedData = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'date' => 'required',
        ]);
        $newDate = $request->date;
        $schedulers = Scheduler::where('journey_date', Carbon::create($newDate))
                                              ->where('route_from',$request->from)
                                              ->where('route_to', $request->to)
                                              ->get();
        return response()->json([
            $schedulers
        ], 201);
    }
    


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'operator_id' => 'required',
        //     'operator_car' => 'required',
        //     'operator_company' => 'required',
        //     'route_from' => 'required',
        //     'route_to' => 'required',
        //     'journey_date' => 'required',
        //     'departure_time' => 'required',
        //     'arrival_time' => 'required',
        //     'journey_time' => 'required',
        //     'journey_price' => 'required',
        //     'message' => 'required',
        //     ]);
        $scheduler = new Scheduler;
 
        $scheduler->operator_id       = $request->operator_id;
        $scheduler->operator_car      = $request->operator_car;
        $scheduler->operator_company  = $request->operator_company;
        $scheduler->route_from        = $request->route_from;
        $scheduler->route_to          = $request->route_to;
        $scheduler->journey_date      = $request->journey_date;
        $scheduler->departure_time    = $request->departure_time;
        $scheduler->arrival_time      = $request->arrival_time;
        $scheduler->journey_time      = $request->journey_time;
        $scheduler->journey_price     = $request->journey_price;
        $scheduler->message           = $request->message;
 
        $scheduler->save();
        
        return response()->json([
            "message" => "scheduler created Successfully",
            $scheduler
        ], 201);
    }

  
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

    public function findByOperator($id)
    {
        if (Scheduler::where('operator_id', $id)->exists()) {
            $scheduler = Scheduler::where('operator_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
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

        if (Scheduler::where('id', $id)->exists()) {

            $scheduler                    = Scheduler::find($id);

            $scheduler->operator_id       = is_null($request->operator_id) ? $scheduler->operator_id : $request->operator_id;
            $scheduler->operator_car      = is_null($request->operator_car) ? $scheduler->operator_car : $request->operator_car;
            $scheduler->operator_company  = is_null($request->operator_company) ? $scheduler->operator_company : $request->operator_company;
            $scheduler->route_from        = is_null($request->route_from) ? $scheduler->route_from : $request->route_from;
            $scheduler->route_to          = is_null($request->route_to) ? $scheduler->route_to : $request->route_to;
            $scheduler->journey_date      = is_null($request->journey_date) ? $scheduler->journey_date : $request->journey_date;
            $scheduler->departure_time    = is_null($request->departure_time) ? $scheduler->departure_time : $request->departure_time;
            $scheduler->arrival_time      = is_null($request->arrival_time) ? $scheduler->arrival_time : $request->arrival_time;
            $scheduler->journey_time      = is_null($request->journey_time) ? $scheduler->journey_time : $request->journey_time;
            $scheduler->journey_price     = is_null($request->journey_price) ? $scheduler->journey_price : $request->journey_price;
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
              "message" => "scheduler deleted successfully"
            ], 202);
        } else {
            return response()->json([
              "message" => "$scheduler not found"
            ], 404);
        }
    }
}
