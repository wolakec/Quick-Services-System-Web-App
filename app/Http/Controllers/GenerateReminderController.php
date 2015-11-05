<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\Reminder;
use App\Notification;
use PushNotification;
use Log;


class GenerateReminderController extends Controller {
    
    public function scan()
    {
       $date = date('Y-m-d');
       //$date = "2015-07-02";
       
       Log::info("scan was called");
       
       $reminders = Reminder::where('trigger_date','<',$date)->where('triggered','=',false)->get();
       $reminders->load('serviceType','vehicle.model');
       
       foreach($reminders as $reminder){
           Log::info("reminder triggered");
           $title = "Time for a ". $reminder->serviceType->name."!";
           $message = "The last time you performed a ". strtolower($reminder->serviceType->name)." on your ".$reminder->vehicle->model->name." was ".$reminder->created_at->diffForHumans().".";
           
           $client = Client::find($reminder->vehicle->client_id);
           
           if($client){
               
            $token = $client->gcm_token;
            if($token){
                 $message = PushNotification::Message($message,
                     array('title' => $title,
                         'client_id' => $reminder->vehicle->client_id,
                         'vehicle_id' => $reminder->vehicle_id,
                         'service_type_id' => $reminder->service_type_id,
                         'type' => 'reminder',
                         )
                     );

                 $push = PushNotification::app('qssClient')
                         ->to($token)
                         ->send($message);

             }
             $reminder->triggered = true;
             $reminder->save();
           }
           
           
       }
       
       //return $reminders;
    }
   
}
