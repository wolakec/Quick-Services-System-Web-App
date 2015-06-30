<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Position;

class MapController extends Controller {
    
    public function view($id)
    {
        return view('pages.stationLocation',['stationId' => $id]);
    }
    
    public function store(Request $request, $id)
    {
        $station = Station::find($id);
        
        if(!$station){
            return response()->json(['status' => 'false']);
        }
        
        
        $position = Position::create($request->input('position'));
        $position->save();
        
        return response()->json(['status' => 'true']);
    }
}
