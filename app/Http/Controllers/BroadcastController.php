<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\notificationRequest;
use Illuminate\Http\Request;
use App\Client;
use App\Notification;



class BroadcastController extends Controller {
    
    public function add()
    {
        return view('pages.addBroadcast');
    }
    
    public function store(notificationRequest $request)
    {
       $clients = Client::all();
       
       foreach($clients as $client){
          
           $notification = Notification::create($request->all());
           $notification->client_id = $client->id;
           $notification->status = "pending";
           $notification->type = "broadcast";
           $notification->save();
       }
       
       return redirect('notifications/add');
    }
   
}
