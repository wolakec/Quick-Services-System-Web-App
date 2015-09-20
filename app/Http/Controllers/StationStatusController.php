<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Station;
use App\StationStatus;
use DB;

class StationStatusController extends Controller {
    
    public function index($id)
    {
        $station = Station::findOrFail($id);
        $this->authorize('viewStock',$station);

        if(!$station->status){
            $status = new StationStatus;
            $status->has_petrol = true;
            $status->has_diesel = true;
            $status->is_open = true;
            $status->message = "";
            
            $status->save();
            
            $station->station_status_id = $status->id;
            $station->save();
        }
        
        $status = $station->status;
        
        return view('pages.viewStationStatus',['station' => $station,'status' => $status]);
    }
    
    public function edit($id)
    {
        $station = Station::findOrFail($id);
        $this->authorize('viewStock',$station);
        
        $status = $station->status;
        
        return view('pages.editStationStatus',['station' => $station,'status' => $status]);
    }

    public function update(Request $request, $id)
    {
        $station = Station::findOrFail($id);
        $this->authorize('viewStock',$station);

        $status = $station->status;
        $status->update($request->all());

        return redirect('/stations/'.$id.'/status/');
    }
}

