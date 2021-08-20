<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_seat;
use App\Http\Requests\BusSeatsRequest;
use App\Http\Requests\UpdateBusSeatsRequest;

class BusSeatsController extends Controller
{
    //insert data to the table
    public function create(BusSeatsRequest $request){

        //create bus variable towards the data
        $bus_seats = new Bus_seat();

        //call the fields
        $bus_seats->bus_id = $request->input('bus_id');
        $bus_seats->seat_number = $request->input('seat_number');
        $bus_seats->price = $request->input('price');

        $bus_seats->save(); //save the data
        return response()->json(['message'=>'Bus seats Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $bus_seats = Bus_seat::all();
        return response()->json(['bus_seats'=>$bus_seats],200);
    }
    //Retrieve added data using the specific id
    public function show($id)
    {
        $bus_seats = Bus_seat::find($id);
        if($bus_seats)
        {
            return response()->json(['bus_seats' => $bus_seats], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Bus Found'],404);
        }
    }

    //update data
    public function update(UpdateBusSeatsRequest $request,$id)
    {

        $bus_seats = Bus_seat::find($id);

        if($bus_seats)
        {
            //call the fields
            $bus_seats->name = $request->input('bus_id');
            $bus_seats->type = $request->input('seat_number');
            $bus_seats->price = $request->input('price');

            $bus_seats->update(); //update the data
            return response()->json(['message' => 'Bus Updated Successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }
    }

    //delete data
    public function delete($id)
    {
        $bus_seats = Bus_seat::find($id);
        if($bus_seats)
        {
            $bus_seats->delete();
            return response()->json(['message' => 'Bus seat deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Bus seat Not found'], 200); //return response
        }

    }
}
