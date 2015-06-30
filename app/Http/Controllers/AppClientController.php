<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\ServiceType;
use App\Position;
use Hash; 

class AppClientController extends Controller {
    
    public function store(Request $request)
    {
        $email = $request->input('email');
        $client = Client::where('email', '=', $email)->first();
        
        if($client){
            return response()->json(['status' => 'false']);
        }
        $client = Client::create($request->all());
        $client->password = Hash::make($request->input('password'));
        $client->save();
        
        return response()->json(['status' => 'true']);
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
                return response()->json(['status' => 'true', 'id' => $client->id]);       
            }else{
                return response()->json(['status' => 'false', 'id' => null]);
            }
        }else{
            return response()->json(['status' => 'false', 'id' => null]);
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
            return response()->json(['status' => 'false']);
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
            $temp = $vehicle->services->keyBy('service_type_id');
            unset($vehicle['services'],$vehicle['fuel'],$vehicle['client_id'],$vehicle['created_at'],$vehicle['updated_at']
                    ,$vehicle['qr_code_id'],$vehicle['model_id'],$vehicle['year']);
            $vehicle->services = $temp;
        }
       
        return $vehicles;
    }
    
    public function viewStationPositions()
    {
        $positions = Position::all();
        $positions->load('station');
        
        return $positions;
    }
}
