<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_shedule;
use App\Http\Requests\BusScheduleRequest;
use App\Http\Requests\UpdateBusScheduleRequest;

class BusSheduleController extends Controller
{
    //insert data to the table
    public function create(BusScheduleRequest $request){

        $validated = $request->validated();

        //create bus variable towards the data
        $bus_shedules = Bus_shedule::create($validated);

        $bus_shedules->save(); //save the data
        return response()->json(['message'=>'Bus schedule Added Successfully'],200); //return response
    }

    //get the book schedule list
    public function index()
    {
        $bus_shedules = Bus_shedule::all();
        return response()->json(['buses'=>$bus_shedules],200);
    }
    //Get the book schedule for specific id
    public function show($id)
    {
        $bus_shedules = Bus_shedule::find($id);
        if($bus_shedules)
        {
            return response()->json(['bus_shedules' => $bus_shedules], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Bus Found'],404);
        }
    }

    //update data
    public function update(UpdateBusScheduleRequest $request,$id)
    {
        $bus_shedules = Bus_shedule ::find($id);

        if($bus_shedules)
        {
            //call the fields
            $bus_shedules->bus_route_id = $request->input('bus_route_id');
            $bus_shedules->direction = $request->input('direction');
            $bus_shedules->start_timestamp = $request->input('start_timestamp');
            $bus_shedules->end_timestamp = $request->input('end_timestamp');

            $bus_shedules->update(); //update the data
            return response()->json(['message' => 'Bus schedule Updated Successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }
    }

    //delete data
    public function delete($id)
    {
        $bus_shedules = Bus_shedule::find($id);
        if($bus_shedules)
        {
            $bus_shedules->delete();
            return response()->json(['message' => 'Bus schedule deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }

    }
}
