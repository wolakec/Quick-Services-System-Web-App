<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Alert;
use App\Client;

class EmployeeAlertController extends Controller {
    
    public function index()
    {
        $alerts = Alert::all();
        
        return view('pages.listAdminAlerts', ['alerts' => $alerts]);
    }
    
    public function create()
    {
        return view('pages.addAlert');
    }
    
    public function store(Request $request)
    {
        
        $user = $request->user();
            
        if(!$user->employee){
            return redirect('/');
        }
            
        $alert = Alert::create($request->all());
   
        $alert->station_id = $user->employee->station_id;
        $alert->employee_id = $user->employee->id;

        $alert->type = "message";
        $alert->status = "pending";

        $alert->save();
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


