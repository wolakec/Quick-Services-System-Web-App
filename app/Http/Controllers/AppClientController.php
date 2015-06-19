<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
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
}
