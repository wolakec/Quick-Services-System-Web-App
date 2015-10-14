<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\notificationRequest;
use Illuminate\Http\Request;

use DB;

class AmmariController extends Controller {
    
    public function add()
    {
        return view('pages.clearTokens');
    }
    
    public function store(request $request)
    {
       DB::table('oauth_access_tokens')
               ->delete();
       
       return redirect('/clear')->withInput()->with('success', 'Tokens cleared.');
              
    }
   
}
