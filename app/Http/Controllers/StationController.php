<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Employee;

class StationController extends Controller {
    
    public function index()
    {
        $stations = Station::all();
        
        return view('pages.listStations',['stations' => $stations]);
    }
    
    public function add()
    {
        $locations = Location::all();
        
        return view('pages.addStation',['locations' => $locations]);
    }
    
    public function store(Request $request)
    {
       $station = Station::create($request->all());
       
    }
    
    public function viewEmployees($id)
    {
        $station = Station::find($id);
        
        $employees = $station->employees;
        
        return view('pages.listEmployees',['employees' => $employees]);
    }
   
}
