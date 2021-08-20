<?php

namespace App\Http\Controllers;

use App\Models\Bus_schedule_booking;
use Illuminate\Http\Request;
use App\Http\Requests\BusSchedulingBookingRequest;
use App\Http\Requests\UpdateBusSchedulingBookingRequest;

class BusScheduleBookingController extends Controller
{

    //insert data to the table
    public function create(BusSchedulingBookingRequest $request){

        //create bus variable towards the data
        $bus_schedule_bookings = new Bus_schedule_booking();

        //call the fields
        $bus_schedule_bookings->bus_seats_id = $request->bus_seats_id;
        $bus_schedule_bookings->user_id = $request->input('user_id');
        $bus_schedule_bookings->bus_schedule_id = $request->input('bus_schedule_id');
        $bus_schedule_bookings->seat_number = $request->input('seat_number');
        $bus_schedule_bookings->price = $request->input('price');
        $bus_schedule_bookings->status = $request->input('status');

        $bus_schedule_bookings->save(); //save the data
        return response()->json(['message'=>'Bus Added Successfully'],200); //return response
    }

    //get the bus booking list
    public function index()
    {
        $bus_schedule_bookings = Bus_schedule_booking::all();
        return response()->json(['bus_schedule_bookings'=>$bus_schedule_bookings],200);
    }
    //grt the bus booking list for specific id
    public function show($id)
    {
        $bus_schedule_bookings = Bus_schedule_booking::find($id);
        if($bus_schedule_bookings)
        {
            return response()->json(['buses' => $bus_schedule_bookings], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Bus Booking Found'],404);
        }
    }

    //update data
    public function update(UpdateBusSchedulingBookingRequest $request,$id)
    {
        $bus_schedule_bookings = Bus_schedule_booking ::find($id);

        if($bus_schedule_bookings)
        {
            //call the fields
            $bus_schedule_bookings->bus_seats_id = $request->input('bus_seats_id');
            $bus_schedule_bookings->user_id = $request->input('user_id');
            $bus_schedule_bookings->bus_schedule_id = $request->input('bus_schedule_id');
            $bus_schedule_bookings->seat_number = $request->input('seat_number');
            $bus_schedule_bookings->price = $request->input('price');
            $bus_schedule_bookings->status = $request->input('status');

            $bus_schedule_bookings->update(); //update the data
            return response()->json(['message' => 'Bus Booking Updated Successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }
    }

    //delete data
    public function delete($id)
    {
        $bus_schedule_bookings = Bus_schedule_booking::find($id);
        if($bus_schedule_bookings)
        {
            $bus_schedule_bookings->delete();
            return response()->json(['message' => 'Bus Booking deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }

    }
}
