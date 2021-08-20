<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Http\Requests\RouteRequest;
use App\Http\Requests\UpdateRouteRequest;

class RouteController extends Controller
{
    //insert data to the table
    public function createRoute(RouteRequest $request){

        //create route variable towards the data
        $route= new Route();

        //call the fields
        $route->node_one = $request->input('node_one');
        $route->node_two = $request->input('node_two');
        $route->route_number = $request->input('route_number');
        $route->distance = $request->input('distance');
        $route->time = $request->input('time');

        $route->save(); //save the data
        return response()->json(['message'=>'Route Added Successfully'],200); //return response
    }
    //Retrieve added data
    public function indexRoute()
    {
        $routes = Route::all();

        return response()->json(['routes' => $routes], 200);
    }
    //Retrieve added data using the specific id
    public function showRoute($id)
    {
        $routes = Route::find($id);
        if($routes)
        {
            return response()->json(['routes' => $routes], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Route Found'],404);
        }
    }

    //update data
    public function updateRoute(UpdateRouteRequest $request,$id)
    {

        $routes = Route ::find($id);

        if($routes)
        {
            //call the fields
            $routes->node_one = $request->input('node_one');
            $routes->node_two = $request->input('node_two');
            $routes->route_number = $request->input('route_number');
            $routes->distance = $request->input('distance');
            $routes->time = $request->input('time');

            $routes->updateRoute(); //update the data
            return response()->json(['message' => 'Route Updated Successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Route Not found'], 200); //return response
        }

    }

    public function deleteRoute($id)
    {
        $routes = Route::find($id);
        if($routes)
        {
            $routes->deleteRoute();
            return response()->json(['message' => 'Route deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Route Not found'], 200); //return response
        }

    }
}
