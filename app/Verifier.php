<?php namespace App;

use Hash;
use Auth;

use App\Client;
use App\OauthTemp;

class Verifier {
    
    public function verify($email,$password)
    {
        $auth = new \Authorizer;
       
        $temp = OauthTemp::where('username','=', $email)
                ->where('processed','=',false)
                ->first();
        
        
        
        if(!$temp){
            return false;
        }else{
            $temp->processed = true;
            $temp->save();
        }
        
        if($temp->client_id == "client"){
            $client = Client::where('email', '=', $email)->first();
            $temp->delete();
            if($client){
                if(hash::check($password,$client->password)){ 
                    return $client->id;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
        if($temp->client_id == "employee"){
            $temp->delete();
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                $user = Auth::user();
                $employee = $user->employee;
                return $employee->id;       
            }else{
                return false;
            }
        }
        
        $temp->delete();
        return false;
    }
    
    public function verifyEmployee($email,$password)
    {
        return false;
    }
}