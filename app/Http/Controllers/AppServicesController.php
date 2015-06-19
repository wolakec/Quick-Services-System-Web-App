<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AppServicesController extends Controller {
    
    public function store(Request $request)
    {
        $client = Client::create($request->all());
        $client->password = Hash::make($request->input('password'));
        $client->save();
        
         return response()->json(['status' => 'true']);
    }
   
}
