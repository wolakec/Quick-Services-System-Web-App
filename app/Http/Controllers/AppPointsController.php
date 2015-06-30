<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Reward;
use App\Client;


class AppPointsController extends Controller {
    
    public function viewPoints($id)
    {
        $client = Client::find($id);
       
        return response()->json(['points' => $client->points]);
    }
}
