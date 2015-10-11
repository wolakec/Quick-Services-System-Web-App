<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Station;

use DB;

class ServiceTypeAvailabilityController extends Controller {
    
    public function edit($id)
    {
        $station = Station::findOrFail($id);
        $this->authorize('viewStock',$station);
        $services = DB::table('station_services')
                ->where('station_id','=',$id)
                ->join('service_types','station_services.service_type_id','=','service_types.id')
                ->get();
         
        
        return view('pages.editServiceAvailability',['station' => $station,'serviceTypes' => $services]);
    }

    public function update(Request $request, $id)
    {
        $station = Station::findOrFail($id);
        $this->authorize('viewStock',$station);

        foreach($request->serviceTypes as $index => $availability){
             $type = DB::table('station_services')
                ->where('station_id','=',$id)
                ->where('service_type_id','=',(int)$index)
                ->update(array('is_available' => $availability));
            
        }

       return redirect('/stations/'.$id.'/services/types/');
    }
}

