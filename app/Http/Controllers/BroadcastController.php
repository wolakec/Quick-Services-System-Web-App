<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\notificationRequest;
use Illuminate\Http\Request;
use App\Client;
use App\Notification;
use App\BroadcastHistory;



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
       
       $broadcastHistory = BroadcastHistory::create($request->all());
       $broadcastHistory->user_id = $request->user()->id;
       $broadcastHistory->save();
       
       return redirect('/notifications')->withInput()->with('success', 'brodcast was published Successfully.');;
    }
   
}
