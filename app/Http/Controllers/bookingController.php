<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use db;

class bookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
 
        return response()->json(
            $bookings
        );
     }

    public function create()
    {
        //
     }

    public function store(Request $request)
    {
        $booking = new Booking;

        $booking->user_id          = $request->user_id;
        $booking->route_id         = $request->route_id;
        $booking->scheduler_id     = $request->scheduler_id;
        $booking->operator_id      = $request->operator_id;
        $booking->loc_from         = $request->loc_from;
        $booking->loc_to           = $request->loc_to;
        $booking->car_id           = $request->car_id;
        $booking->seat_no          = $request->seat_no;
        $booking->price            = $request->price;
        $booking->payed            = $request->payed;
        $booking->approved         = $request->approved;
        $booking->nbr_people       = $request->nbr_people;
        $booking->nbr_luggage      = $request->nbr_luggage;
        $booking->pickup_date      = $request->pickup_date;
        $booking->pickup_time      = $request->pickup_time;
        $booking->pickup_full_add  = $request->pickup_full_add;
        $booking->dropoff_full_add = $request->dropoff_full_add;
        $booking->custom_message   = $request->custom_message;
 
        $booking->save();
        
        return response()->json([
            "message" => "booking created",
            $booking
        ], 201);
     }
    public function show($id)
    {
        if (Booking::where('id', $id)->exists()) {
            $booking = Booking::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($booking, 200);
        } else {
            return response()->json([
              "message" => "booking not found"
            ], 404);
        }
     }
    public function edit($id)
    {
        //
     }

    public function update(Request $request, $id)
    {
        if (Booking::where('id', $id)->exists()) {

            $booking                   = Booking::find($id);

            $booking->user_id          = is_null($request->user_id) ? $booking->user_id : $request->user_id;
            $booking->route_id         = is_null($request->route_id) ? $booking->route_id : $request->route_id;
            $booking->scheduler_id     = is_null($request->scheduler_id) ? $booking->scheduler_id : $request->scheduler_id;
            $booking->operator_id     = is_null($request->operator_id) ? $booking->operator_id : $request->operator_id;
            $booking->loc_from         = is_null($request->loc_from) ? $booking->loc_from : $request->loc_from;
            $booking->loc_to           = is_null($request->loc_to) ? $booking->loc_to : $request->loc_to;
            $booking->car_id           = is_null($request->car_id) ? $booking->car_id : $request->car_id;
            $booking->seat_no          = is_null($request->seat_no) ? $booking->seat_no : $request->seat_no;
            $booking->price            = is_null($request->price) ? $booking->price : $request->price;
            $booking->payed            = is_null($request->payed) ? $booking->payed : $request->payed;
            $booking->approved         = is_null($request->approved) ? $booking->approved : $request->approved;
            $booking->nbr_people       = is_null($request->nbr_people) ? $booking->nbr_people : $request->nbr_people;
            $booking->nbr_luggage      = is_null($request->nbr_luggage) ? $booking->nbr_luggage : $request->nbr_luggage;
            $booking->pickup_date      = is_null($request->pickup_date) ? $booking->pickup_date : $request->pickup_date;
            $booking->pickup_time      = is_null($request->pickup_time) ? $booking->pickup_time : $request->pickup_time;
            $booking->pickup_full_add  = is_null($request->pickup_full_add) ? $booking->pickup_full_add : $request->pickup_full_add;
            $booking->dropoff_full_add = is_null($request->dropoff_full_add) ? $booking->dropoff_full_add : $request->dropoff_full_add;
            $booking->custom_message   = is_null($request->custom_message) ? $booking->custom_message : $request->custom_message;
 
            $booking->save();
 
            return response()->json([
                "message" => "bookings updated successfully",
                $booking
            ], 200);
        } else{
            return response()->json([
                "message" => "booking not found"
            ], 404);
        };
     }

    public function findByScheduler($id)
    {
        if (Booking::where('scheduler_id', $id)->exists()) {
            $booking = Booking::where('scheduler_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($booking, 200);
        } else {
            return response()->json([
              "message" => "booking not found"
            ], 404);
        }
     }
    public function findByOperator($id)
    {
        if (Booking::where('operator_id', $id)->exists()) {
            // $booking = Booking::where('operator_id', $id)->orderBy('id',DESC)->get()->toJson(JSON_PRETTY_PRINT);
            $booking = Booking::where('operator_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($booking, 200);
        } else {
            return response()->json([
              "message" => "booking not found"
            ], 404);
        }
     }

    public function findByUser($id)
    {
         if (Booking::where('user_id', $id)->exists()) {
             $booking = Booking::where('user_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
             return response($booking, 200);
         } else {
             return response()->json([
               "message" => "booking not found"
             ], 404);
         }
      }
    public function findUnpaidByUser($id)
    {
         if (Booking::where('user_id', $id)->exists()) {
             $booking = Booking::where('user_id', $id)
                                 ->where('payed', false)
                                 ->orWhere('payed', null)
                                 ->get()->toJson(JSON_PRETTY_PRINT);
             return response($booking, 200);
         } else {
             return response()->json([
               "message" => "booking not found"
             ], 404);
         }
      }
    public function findPendingByUser($id)
    {
         if (Booking::where('user_id', $id)->exists()) {
             $booking = Booking::where('user_id', $id)
                                 ->where("approved", false)
                                 ->orWhere('approved', null)
                                 ->get()->toJson(JSON_PRETTY_PRINT);
             return response($booking, 200);
         } else {
             return response()->json([
               "message" => "booking not found"
             ], 404);
         }
      }

    public function destroy($id)
    {
        if(Booking::where('id', $id)->exists()) {
            $booking = Booking::find($id);
            $booking->delete();
    
            return response()->json([
              "message" => "booking deleted"
            ], 202);
        } else {
            return response()->json([
              "message" => "booking not found"
            ], 404);
        }
     }

   
}
