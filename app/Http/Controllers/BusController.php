<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Http\Requests\BusRequest;
use App\Http\Requests\UpdateBusRequest;

class BusController extends Controller
{

    //insert data to the table
    public function create(BusRequest $request){

        $validated = $request->validated();

        //create bus variable towards the data
        $buses = Bus::create($validated);

        $buses->save(); //save the data
        return response()->json(['message'=>'Bus Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $buses = Bus::all();
        return response()->json(['buses'=>$buses],200);
    }
    //Retrieve added data using the specific id
    public function show($id)
    {
        $buses = Bus::find($id);
        if($buses)
        {
            return response()->json(['buses' => $buses], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Bus Found'],404);
        }
    }

    //update data
    public function update(UpdateBusRequest $request,$id)
    {
        $buses = Bus ::find($id);

        if($buses)
        {
            //call the fields
            $buses->name = $request->input('name');
            $buses->type = $request->input('type');
            $buses->vehicle_number = $request->input('vehicle_number');

            $buses->update(); //update the data
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
        $buses = Bus::find($id);
        if($buses)
        {
            $buses->delete();
            return response()->json(['message' => 'Bus deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }

    }

}
