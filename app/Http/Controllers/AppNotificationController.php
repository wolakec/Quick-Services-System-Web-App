<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notification;
use App\Client;


class AppNotificationController extends Controller {
    
    public function viewNotifications($id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => false]);
        }
        
        $notifications = $client->notifications()->where('status','=','pending')->get();
        
        foreach($notifications as $notification){
            $notification->status = "fetched";
            $notification->save();
        }
        
        return $notifications;
    }
    
    public function confirm(Request $request)
    {
        
    }
}
