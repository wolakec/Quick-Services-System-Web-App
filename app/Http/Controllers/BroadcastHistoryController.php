<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\BroadcastHistory;



class BroadcastHistoryController extends Controller {
    
    public function index()
    {
        $history = BroadcastHistory::all();
       
        
        return view('pages.listBroadcastHistory',['broadcasts' => $history]);
    }
   
}
