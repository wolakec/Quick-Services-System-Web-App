<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\Vehicle;
use App\Employee;

class VehicleController extends Controller {
    
    public function store(Request $request,$id)
    {
        $employee = Employee::find($id);
        if(!$employee){
            return response()->json(['status' => 'false']);
        }
        
        $client = Client::find($request->get('client_id'));
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $vehicle = Vehicle::create($request->all());
        $client->vehicle()->assign($vehicle);
        $vehicle->save();
        
        return response()->json(['status' => 'true']);
    }
   
}
