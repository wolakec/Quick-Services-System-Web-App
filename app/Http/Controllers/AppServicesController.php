<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Employee;
use App\Vehicle;
use App\QrCode;
use App\Service;


class AppServicesController extends Controller {
    
    public function store(Request $request,$id)
    {
        $input = $request->all();

        $employee = Employee::find($id);
        if(!$employee){
            return response()->json(['status' => 'false']);
        }
         
        $employee->load('station');
        
        $code = QrCode::where('body','=',$input['qr_code'])->first();
        
        if(!$code){
            return response()->json(['status' => 'false']);
        }
            
        $vehicle = Vehicle::where('qr_code_id','=',$code->id)->first();
        if(!$vehicle){
            return response()->json(['status' => 'false']);
        }
        
        $client = $vehicle->client;
        
        $services = json_decode($input['services']);
       
        foreach($services as $service){
            $newService = new Service;
            $newService->service_type_id = $service->service_id;
            $newService->station_id = $employee->station->id;
            $newService->vehicle_id = $vehicle->id;
            $newService->employee_id = $id;
            
            $newService->save();
            
            $value = $newService->type->value->points;
            if(!$client->points){
                $client->points = $value;
            }else{
                $client->points = $client->points + $value;
            }
            
            $client->save();
            
        }
        
         return response()->json(['status' => 'true']);
    }
   
}
