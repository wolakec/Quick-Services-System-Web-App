<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\ClientReminderPreference;
use App\DefaultReminderPreference;

use Log;


class AppReminderPreferencesController extends Controller {
    
    public function listPreferences($id)
    {
        $client = Client::find($id);
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        if($client->reminderPreferences){
            return $client->reminderPreferences;
        }else{
            return DefaultReminderPreference::all();
        }
    }
    
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
            $reminder = ClientReminderPreference::where('service_type_id','=',$preference->service_type_id)
                    ->where('client_id','=',$client->id)->first();
            if($reminder){
                $reminder->period = $preference->period;
            }else{
                $reminder = new ClientReminderPreference;
                $reminder->service_type_id = $preference->service_type_id;
                $reminder->period = $preference->period;
                $reminder->client_id = $client->id;
            }
            $reminder->save();
        }
        
        return response()->json(['status' => 'true']);
    }
   
}
