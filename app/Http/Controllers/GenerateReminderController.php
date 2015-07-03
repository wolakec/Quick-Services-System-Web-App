<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\Reminder;
use App\Notification;

use Log;


class GenerateReminderController extends Controller {
    
    public function scan()
    {
       $date = date('Y-m-d');
       $date = "2015-08-29";
       
       $reminders = Reminder::where('trigger_date','=',$date)->where('triggered','=',false)->get();
       $reminders->load('serviceType','vehicle.model');
       
       foreach($reminders as $reminder){
           $title = "Time for a ". $reminder->serviceType->name."!";
           $message = "The last time you performed a ". strtolower($reminder->serviceType->name)." on your ".$reminder->vehicle->model->name." was ".$reminder->created_at->diffForHumans().".";
           
           $notification = new Notification;
           $notification->title = $title;
           $notification->message = $message;
           $notification->client_id = $reminder->vehicle->client_id;
           $notification->vehicle_id = $reminder->vehicle_id;
           $notification->service_type_id = $reminder->service_type_id;
           $notification->status = "pending";
           $notification->type = "reminder";
           $notification->save();
           
           $reminder->triggered = true;
           $reminder->save();
       }
       
       //return $reminders;
    }
   
}
