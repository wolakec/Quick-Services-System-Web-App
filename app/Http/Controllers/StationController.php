<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\stationRequest;
use Illuminate\Http\Request;
use Gate;

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
    
    public function store(stationRequest $request)
    {   
       $station = Station::create($request->all());
       $station->serviceTypes()->attach($request->input('service_type_id'));
       $station->save();
       
       return redirect('stations');
    }
    
    public function edit($id)
    {
        $station = Station::findOrFail($id);
        
        $this->authorize('edit',$station);
        
        $station->load('ServiceTypes');
        
        ///dd($station>serviceTypes);//
        
        $locations = Location::all();
        $serviceTypes = ServiceType::all();
        
        return view('pages.editStation',['locations' => $locations, 'serviceTypes' => $serviceTypes,'station' => $station]);
    }
    
    public function update(stationRequest $request, $id)
    {
        $station = Station::findOrFail($id);
        $station->update($request->all());
        $station->serviceTypes()->sync($request->input('service_type_id'));
        
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
