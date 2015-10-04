<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\ServiceType;
use App\Position;
use Hash; 

use DB;
use Log;

class AppClientController extends Controller {
    
    public function store(Request $request)
    {
        $email = $request->input('email');
        $client = Client::where('email', '=', $email)->first();
        
        if($client){
            return response()->json(['status' => 'false', 'message' => 'This email has been used']);
        }
        $client = Client::create($request->all());
        $client->password = Hash::make($request->input('password'));
        $client->save();
        
        return response()->json(['status' => 'true', 'message' => 'Account created']);
    }
    
    public function login(Request $request) 
    {
        $input = $request->all();
        
        $email = $input['email'];
        $password = $input['password'];
        $data = [];
        
        $client = Client::where('email', '=', $email)->first();

        if($client){
            if(hash::check($password,$client->password)){
                return response()->json(['status' => 'true', 'id' => $client->id, 'message' => 'Login Successful']);       
            }else{
                return response()->json(['status' => 'false', 'id' => null,'message' => 'Incorrect password']);
            }
        }else{
            return response()->json(['status' => 'false', 'id' => null, 'message' => 'This email does not exist']);
        }
    }
    
    public function changePass(Request $request, $id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $oldPassword = $request->input('oldpassword');
        
        if(!hash::check($oldPassword,$client->password)){
            return response()->json(['status' => 'false', 'message' => 'You entered your old password incorrectly']);
        }
        
        $password = hash::make($request->input('newpassword'));
        $client->password = $password;
        $client->save();
            
        return response()->json(['status' => 'true']);
    }
    
    public function viewServiceTypes($id)
    {
        return ServiceType::all();
    }
    
    public function viewServices($id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $vehicles = $client->vehicles;
        
        foreach($vehicles as $index => $vehicle){
            
            $unique = $vehicle->latestServices->unique('service_type_id');
            unset($vehicle['services'],$vehicle['latestServices'],$vehicle['fuel'],$vehicle['client_id'],$vehicle['created_at'],$vehicle['updated_at'],
                    $vehicle['qr_code_id'],$vehicle['model_id'],$vehicle['year']);
            
            $vehicle->services = $unique;
        }
        
        return $vehicles;
    }
    
    public function viewStationPositions()
    {
      
        $positions = DB::table('positions')
                ->join('stations','positions.station_id','=','stations.id')
                ->join('station_status','stations.station_status_id','=','station_status.id')
                ->where('station_status.is_open','=',true)
                ->select('positions.longitude','positions.latitude','stations.name','stations.id')
                ->get();
        
        return $positions;
    }
    
    public function viewAllStationPositions()
    {
      
        $positions = DB::table('positions')
                ->join('stations','positions.station_id','=','stations.id')
                ->join('station_status','stations.station_status_id','=','station_status.id')
                ->select('positions.longitude','positions.latitude','stations.name','stations.id')
                ->get();
        
        return $positions;
    }
    
    public function viewStationPositionsQuery(Request $request)
    {
        
        $positions = array();
        $products = array();
        
        //sleep(2);
                
        if($request->service_type_id){
            $id = $request->service_type_id;
            $positions = DB::table('service_types')
                ->where('service_types.id','=',$id)
                ->join('station_services','service_types.id','=','station_services.service_type_id')
                ->where('station_services.is_available','=',true)
                ->join('stations','station_services.station_id','=','stations.id')
                ->join('station_status','stations.station_status_id','=','station_status.id')
                ->where('station_status.is_open','=',true)
                ->join('positions','stations.id','=','positions.station_id')
                ->select('positions.longitude','positions.latitude','stations.name','stations.id')
                ->get();
        
            $products = DB::table('service_types')
                ->where('service_types.id','=',$id)
                ->join('service_type_categories','service_types.id','=','service_type_categories.service_type_id')
                ->join('categories','service_type_categories.category_id','=','categories.id')
                ->join('products','categories.id','=','products.category_id')
                ->join('packages','products.id','=','packages.product_id')
                ->join('units','packages.unit_id','=','units.id')
                ->select(DB::RAW("packages.id,concat(products.name,' ',units.name) as name"))
                ->get();
            
            return array('positions' => $positions, 'products' => $products);
        }
        
        if($request->product_id){
            $packageId = (int)$request->product_id;
            $positions = DB::table('stock')
                    ->where('package_id','=',$packageId)
                    ->where('quantity','>',0)
                    ->join('stations','stock.station_id','=','stations.id')
                    ->join('station_status','stations.station_status_id','=','station_status.id')
                    ->where('station_status.is_open','=',true)
                    ->join('positions','stations.id','=','positions.station_id')
                    ->select('positions.longitude','positions.latitude','stations.name','stations.id')
                    ->get();
            return $positions;
        }
    }
    
    public function testProduct(Request $request,$id)
    {
        $client = Client::find($id);
        
        return \Authorizer::getResourceOwnerId();
        return $client;
        
    }
    
    public function test($id)
    {
        $client = Client::find($id);
        
        if(!$client){
            return response()->json(['status' => 'false']);
        }
        
        $vehicles = $client->vehicles;
        
        foreach($vehicles as $vehicle){
            return $vehicle->services;
        }
        
        //return $client::with('vehicles')->get();
    }
}
