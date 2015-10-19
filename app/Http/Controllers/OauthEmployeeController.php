<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\ServiceType;
use App\Position;
use App\OauthTemp;
use Hash; 

use DB;
use Log;

class OauthEmployeeController extends Controller {
    
    public function issueToken(Request $request)
    {
        $temp = OauthTemp::create($request->all());
        $temp->processed = false;
        $temp->save();
        
        
        $value = \Authorizer::issueAccessToken();
               
        $clientId = DB::table('oauth_access_tokens')
                ->where('oauth_access_tokens.id','=',$value['access_token'])
                ->join('oauth_sessions','oauth_access_tokens.session_id','=','oauth_sessions.id')
                ->select('oauth_sessions.owner_id')
                ->first();
        
        $value['employee_id'] = (int)$clientId->owner_id;
        
        return $value;
    }
}