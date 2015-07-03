<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\ClientReminderPreference;

use Log;


class AppReminderPreferencesController extends Controller {
    
    public function store(Request $request,$id)
    {
        $input = $request->all();
        //Log::info($input);
        
        $client = Client::find($id);
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $preferences = json_decode($input['preferences']);
        
        foreach($preferences as $preference){
            $reminder = new ClientReminderPreference;
            $reminder->service_type_id = $preference->service_type_id;
            $reminder->period = $preference->period;
            $reminder->client_id = $client->id;
            $reminder->save();
        }
        
        return response()->json(['status' => 'true']);
    }
   
}
