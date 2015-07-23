<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\ServiceType;
use App\Position;
use Hash; 

use DB;
use Log;

class AppClientController extends Controller {
    
    public function store(Request $request)
    {
        $email = $request->input('email');
        $client = Client::where('email', '=', $email)->first();
        
        if($client){
            return response()->json(['status' => 'false', 'message' => 'This email has been used']);
        }
        $client = Client::create($request->all());
        $client->password = Hash::make($request->input('password'));
        $client->save();
        
        return response()->json(['status' => 'true', 'message' => 'Account created']);
    }
    
    public function login(Request $request) 
    {
        $input = $request->all();
        
        $email = $input['email'];
        $password = $input['password'];
        $data = [];
        
        $client = Client::where('email', '=', $email)->first();

        if($client){
            if(hash::check($password,$client->password)){
                return response()->json(['status' => 'true', 'id' => $client->id, 'message' => 'Login Successful']);       
            }else{
                return response()->json(['status' => 'false', 'id' => null,'message' => 'Incorrect password']);
            }
        }else{
            return response()->json(['status' => 'false', 'id' => null, 'message' => 'This email does not exist']);
        }
    }
    
    public function changePass(Request $request, $id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $oldPassword = $request->input('oldpassword');
        
        if(!hash::check($oldPassword,$client->password)){
            return response()->json(['status' => 'false', 'message' => 'You entered your old password incorrectly']);
        }
        
        $password = hash::make($request->input('newpassword'));
        $client->password = $password;
        $client->save();
            
        return response()->json(['status' => 'true']);
    }
    
    public function viewServiceTypes($id)
    {
        return ServiceType::all();
    }
    
    public function viewServices($id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $vehicles = $client->vehicles;
        
        foreach($vehicles as $index => $vehicle){
            
            $unique = $vehicle->latestServices->unique('service_type_id');
            unset($vehicle['services'],$vehicle['latestServices'],$vehicle['fuel'],$vehicle['client_id'],$vehicle['created_at'],$vehicle['updated_at'],
                    $vehicle['qr_code_id'],$vehicle['model_id'],$vehicle['year']);
            
            $vehicle->services = $unique;
        }
        
        return $vehicles;
    }
    
    public function viewStationPositions()
    {
        $positions = Position::all();
        $positions->load('station');
      
        return $positions;
    }
    
    public function test($id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $vehicles = $client->vehicles;
        
        foreach($vehicles as $vehicle){
            return $vehicle->services;
        }
        
        //return $client::with('vehicles')->get();
    }
}
