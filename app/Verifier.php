<?php namespace App;

use Hash;

class Verifier {
    
    public function verify($email,$password)
    {
      
        $client = Client::where('email', '=', $email)->first();

        if($client){
            if(hash::check($password,$client->password)){
                //return response()->json(['status' => 'true', 'id' => $client->id, 'message' => 'Login Successful']);   
                return $client->id;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}