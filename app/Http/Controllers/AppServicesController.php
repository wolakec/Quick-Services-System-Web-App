<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Employee;
use App\Vehicle;
use App\QrCode;
use App\Service;
use App\DefaultReminderPreference;
use App\ClientReminderPreference;
use App\Reminder;
use App\Notification;
use Log;


class AppServicesController extends Controller {
    
    public function invoice() {
       return view('pages.services_invoice');
    }
    
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
            /*
             * Save service
             */
            $newService = new Service;
            $newService->service_type_id = $service->service_id;
            $newService->station_id = $employee->station->id;
            $newService->vehicle_id = $vehicle->id;
            $newService->employee_id = $id;
            
            $newService->save();
            
            /*
             * Add points to client account for service
             */
            $value = $newService->type->value->points;
            if(!$client->points){
                $client->points = $value;
            }else{
                $client->points = $client->points + $value;
            }
            
            $client->save();
            
            /*
             * Create Reminder for service
             */
            $date = $newService->created_at;
    
            $preference = ClientReminderPreference::where('service_type_id','=',$newService->service_type_id)
                    ->where('client_id','=',$client->id)->first();
            if(!$preference){
                $preference = DefaultReminderPreference::where('service_type_id','=',$newService->service_type_id)->first();
            }
            $date = date('Y-m-d', strtotime($date) );
            $date = new \DateTime($date);
            /*
             * Add number of days to our service created date
             */
            $date->add(new \DateInterval('P'.$preference->period.'D'));
            
            $reminder = new Reminder;
            $reminder->service_type_id = $newService->service_type_id;
            $reminder->service_id = $newService->id;
            $reminder->vehicle_id = $newService->vehicle_id;
            $reminder->triggered = false;
            $reminder->trigger_date = $date->format('Y-m-d');
            
            $reminder->save();
            
            $title = $newService->type->name;
            $message = "You just performed a ". strtolower($newService->type->name)." on your ".$newService->vehicle->model->name.".";

            $notification = new Notification;
            $notification->title = $title;
            $notification->message = $message;
            $notification->client_id = $client->id;
            $notification->vehicle_id = $newService->vehicle_id;
            $notification->service_type_id = $newService->service_type_id;
            $notification->status = "pending";
            $notification->type = "service";
            $notification->save();
        }
        
         return response()->json(['status' => 'true']);
    }
    
}
