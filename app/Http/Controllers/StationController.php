<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\stationRequest;
use Illuminate\Http\Request;
use Gate;
use DB;

use App\Location;
use App\Station;
use App\Employee;
use App\ServiceType;
use App\StationStatus;

class StationController extends Controller {
    
    public function index()
    {
        $this->authorize('listStations');
        $stations = Station::paginate(10);
        
        return view('pages.listStations',['stations' => $stations]);
    }
    
    public function add()
    {
        $this->authorize('addStation');
        $locations = Location::all();
        $serviceTypes = ServiceType::all();
        
        return view('pages.addStation',['locations' => $locations, 'serviceTypes' => $serviceTypes]);
    }
    
    public function store(stationRequest $request)
    {   
       $this->authorize('storeStation', []);
       $station = Station::create($request->all());
       $station->serviceTypes()->attach($request->input('service_type_id'));
       
       $status = new StationStatus;
            $status->has_petrol = true;
            $status->has_diesel = true;
            $status->is_open = true;
            $status->message = "";
            
            $status->save();
            
            $station->station_status_id = $status->id;
            $station->save();
            
       $station->save();
       
       return redirect('stations/map');
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
        
        $employees = $station->employees()->paginate(5);
        
        return view('pages.listEmployees',['employees' => $employees]);
    }
   
    public function viewServiceTypes($id)
    {
        $station = Station::findOrFail($id);
        
        $services = DB::table('station_services')
                ->where('station_id','=',$id)
                ->join('service_types','station_services.service_type_id','=','service_types.id')
                ->get();
        
        return view('pages.listServiceTypes',['serviceTypes' => $services, 'station' => $station]);
    }
}
