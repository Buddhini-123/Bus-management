<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_route;
use App\Http\Requests\BusRoutesRequest;
use App\Http\Requests\UpdateBusRoutesRequest;

class BusRoutesController extends Controller
{
    //insert data to the table
    public function create(BusRoutesRequest $request){

        //create bus variable towards the data
        $bus_routes = new Bus_route();

        //call the fields
        $bus_routes->bus_id = $request->bus_id;
        $bus_routes->route_id = $request->input('route_id');
        $bus_routes->status = $request->input('status');
        $bus_routes->price = $request->input('price');

        $bus_routes->save(); //save the data
        return response()->json(['message'=>'Bus Route Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $bus_routes = Bus_route::all();
        return response()->json(['bus_routes'=>$bus_routes],200);
    }
    //Retrieve added data using the specific id
    public function show($id)
    {
        $bus_routes = Bus_route::find($id);
        if($bus_routes)
        {
            return response()->json(['bus_routes' => $bus_routes], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Bus Route Found'],404);
        }
    }

    //update data
    public function update(UpdateBusRoutesRequest $request,$id)
    {
        $bus_routes = Bus_route ::find($id);

        if($bus_routes)
        {
            //call the fields
            $bus_routes->bus_id = $request->input('bus_id');
            $bus_routes->route_id = $request->input('route_id');
            $bus_routes->status = $request->input('status');
            $bus_routes->price = $request->input('price');

            $bus_routes->update(); //update the data
            return response()->json(['message' => 'Bus routes Updated Successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }
    }
    //delete data
    public function delete($id)
    {
        $bus_routes = Bus_route::find($id);
        if($bus_routes)
        {
            $bus_routes->delete();
            return response()->json(['message' => 'Bus deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Id Not found'], 200); //return response
        }

    }
}
