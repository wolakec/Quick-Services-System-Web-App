<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Station;
use App\Stock;
use DB;

class StockController extends Controller {
    
    public function view($id)
    {
        $station = Station::findOrFail($id);
        
        return view('pages.viewStock',['station' => $station]);
    }
    
    public function edit($id)
    {
        $station = Station::find($id);
                
        return view('pages.listStock',['station' => $station]);
    }
    
    public function listStock($id)
    {
        $station = Station::find($id);
        
        $packages = DB::table('packages')
                ->join('products','packages.product_id','=','products.id')
                ->join('categories','products.category_id','=','categories.id')
                ->join('units','packages.unit_id','=','units.id')
                ->leftJoin('stock',function($join) use($id){     
                    $join->on('packages.id','=','stock.package_id')
                            ->where('stock.station_id','=',$id);     
                })
                ->select('packages.*','products.name','products.specification','products.code','categories.name as category_name',
                        'stock.quantity','stock.warning_level','units.name as unit_name')
                ->get();
                
        return $packages;
    }
   
    public function update(Request $request,$id)
    {
        $input = $request->all();
        
        //return $input;
        
        foreach($request->package as $index => $package){
            $stock = Stock::where('station_id',$id)->where('package_id',$index)->first();
            if(!$stock){
                $stock = new Stock;
                $stock->package_id = $index;
                $stock->station_id = $id;
                $stock->warning_level = 0;
                $stock->quantity = $package['quantity'] ? $package['quantity'] : 0;
            }else{
                $stock->quantity = $stock->quantity + $package['quantity'];
            }
            $stock->save();
        }
        
        return redirect('stock/'.$id);
    }
    
    public function editWarnings($id)
    {
        $station = Station::find($id);
                
        return view('pages.listStockWarnings',['station' => $station]);
    }
    
    public function updateWarnings(Request $request,$id)
    {
        $input = $request->all();
        
        //return $input;
        
        foreach($request->package as $index => $package){
            $stock = Stock::where('station_id',$id)->where('package_id',$index)->first();
            if(!$stock){
                $stock = new Stock;
                $stock->package_id = $index;
                $stock->station_id = $id;
                $stock->warning_level = $package['warning_level'];
                $stock->quantity = $package['quantity'] ? $package['quantity'] : 0;
            }else{
                $stock->warning_level = $package['warning_level'];
            }
            $stock->save();
        }
        
        return redirect('stock/'.$id);
    } 
}

