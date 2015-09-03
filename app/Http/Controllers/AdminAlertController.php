<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Alert;
use App\Client;

class AdminAlertController extends Controller {
    
    public function index()
    {
        $alerts = Alert::all();
        
        return view('pages.listAdminAlerts', ['alerts' => $alerts]);
    }
    
    public function listPending()
    {
        $alerts = Alert::where('status','=','pending')->get();
        
        return view('pages.listAdminAlerts', ['alerts' => $alerts]);
    }
    
    public function view($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->status = "fetched";
        $alert->save();
        
        return view('pages.viewAdminAlert',['alert' => $alert]);
    }
   
}
