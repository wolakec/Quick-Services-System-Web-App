<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\notificationRequest;
use Illuminate\Http\Request;
use PushNotification;
use App\Client;
use App\Notification;
use App\BroadcastHistory;



class BroadcastController extends Controller {
    
    public function add()
    {
        return view('pages.addBroadcast');
    }
    
    public function confirm(notificationRequest $request){
        //dd($request);
        return view('pages.confirmBrodcast')->with('request',$request);
    }


    public function store(notificationRequest $request)
    {
       $clients = Client::all();
       $deviceList = array();
       
        foreach($clients as $client){
          
            if($client->gcm_token){
                $deviceList[] = PushNotification::device($client->gcm_token);
            }
       }
       
       $devices = PushNotification::deviceCollection($deviceList);
       
       $message = PushNotification::Message($request->message,
                     array('title' => $request->title,
                         'type' => 'reminder',
                         )
                     );

                 $push = PushNotification::app('qssClient')
                         ->to($devices)
                         ->send($message);
       
       
       $broadcastHistory = BroadcastHistory::create($request->all());
       $broadcastHistory->user_id = $request->user()->id;
       $broadcastHistory->save();
       
       return redirect('/notifications')->withInput()->with('success', 'brodcast was published Successfully.');
    }
   
}
