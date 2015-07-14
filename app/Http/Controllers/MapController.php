<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Position;

class MapController extends Controller {
   
    public function index()
    {
        return view('pages.stationLocations');
    }
    
    public function noPosition()
    {
        $positions = Position::all(['station_id']);
        
        $stations = Station::whereNotIn('id',$positions)->get();
        
        return $stations;
    }
    
    public function view($id)
    {
        return view('pages.stationLocation',['stationId' => $id]);
    }
    
    public function store(Request $request)
    {
      
        
        
       foreach($request->markers as $marker){
          $position = Position::where('station_id','=',$marker['id'])->first();
          if($position){
              $position->longitude = $marker['coords']['longitude'];
              $position->latitude = $marker['coords']['latitude'];
          }else{
              $position = new Position;
              $position->longitude = $marker['coords']['longitude'];
              $position->latitude = $marker['coords']['latitude'];
              $position->station_id = $marker['id'];
          }
          
          $position->save();
       }
       
       return response()->json(['status' => true,'message' => 'Positions saved']);
    }
}
