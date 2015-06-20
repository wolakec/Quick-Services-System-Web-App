<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Client;
use App\Vehicle;
use App\QrCode;

class AppVehicleController extends Controller {
    
    public function store(Request $request)
    {
        $client = Client::find($request->input('id'));
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $code = QrCode::where('body','=',$request->input('QrCode'))->first();
        
        if(!$code){
            return response()->json(['status' => 'false']);
        }
        
        $vehicle = Vehicle::create($request->all());
        $vehicle->client()->assign($client);
        $vehicle->qrCode()->assign($code);
        $vehicle->save();
        
        return response()->json(['status' => 'true']);
    }

}


