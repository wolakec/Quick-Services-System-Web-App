<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Employee;
use App\ServiceType;

class StationController extends Controller {
    
    public function index()
    {
        $stations = Station::all();
        
        return view('pages.listStations',['stations' => $stations]);
    }
    
    public function add()
    {
        $locations = Location::all();
        $serviceTypes = ServiceType::all();
        
        return view('pages.addStation',['locations' => $locations, 'serviceTypes' => $serviceTypes]);
    }
    
    public function store(Request $request)
    {
       $station = Station::create($request->all());
       $station->serviceTypes()->attach($request->input('service_type_id'));
       $station->save();
       
       return redirect('stations');
    }
    
    public function viewEmployees($id)
    {
        $station = Station::find($id);
        
        $employees = $station->employees;
        
        return view('pages.listEmployees',['employees' => $employees]);
    }
   
    public function viewServiceTypes($id)
    {
        $station = Station::find($id);
        
        return view('pages.listServiceTypes',['serviceTypes' => $station->serviceTypes, 'station' => $station]);
    }
}
