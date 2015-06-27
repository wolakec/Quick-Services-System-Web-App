<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Client;
use App\Employee;
use App\Vehicle;
use App\QrCode;

class AppVehicleController extends Controller {
    
    public function view($id)
    {
         $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        if(!$client->vehicles){
            return response()->json(['status' => 'false']);
        }
        
        $vehicles = $client->vehicles;
        
        $vehicles->load('model.make');
        
        return $vehicles;
    }
    public function store(Request $request,$id)
    {
        $employee = Employee::find($id);
        if(!$employee){
            return response()->json(['status' => 'false']);
        }
        
        $client = Client::find($request->input('client_id'));
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $code = QrCode::where('body','=',$request->input('qr_code'))->first();
        
        if(!$code){
            return response()->json(['status' => 'false']);
        }
        
        $test = Vehicle::where('qr_code_id','=',$code->id)->first();
        if($test){
            return response()->json(['status' => 'false']);
        }
        
        $vehicle = Vehicle::create($request->all());
        $vehicle->client()->associate($client);
        $vehicle->qrCode()->associate($code);
        $vehicle->save();
        
        return response()->json(['status' => 'true']);
    }

}


