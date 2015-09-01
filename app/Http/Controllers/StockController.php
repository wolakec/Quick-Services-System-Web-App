<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Station;
use App\Stock;
use App\Transaction;
use App\TransactionDetail;
use DB;

class StockController extends Controller {
    
    public function view($id)
    {
        $station = Station::findOrFail($id);
        
        return view('pages.viewStock',['station' => $station]);
    }
    
    public function edit($id)
    {
        $station = Station::findOrFail($id);
                
        return view('pages.listStock',['station' => $station]);
    }
    
    public function listStock($id)
    {
        $station = Station::findOrFail($id);
        
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
        $station = Station::findOrFail($id);
        $input = $request->all();
        
        $user = $request->user();
            
        if(!$user->employee){
            return redirect('/');
        }
        
        if($user->employee->station_id != $id){
            abort(403);
        }

        $transaction = new Transaction;
        $transaction->employee_id = $user->employee->id;
        $transaction->station_id = $user->employee->station_id;
        $transaction->save();
        
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
            
            
            
            if($package['quantity'] > 0){
                $stock->load('package');
            
                $detail = new TransactionDetail;
                $detail->price = $stock->package->cost;
                $detail->total_price = $stock->package->cost * $package['quantity'];
                $detail->transaction_id = $transaction->id;
                $detail->package_id = $stock->package_id;
                $detail->quantity = $package['quantity'];
                $detail->type = "stock";

                $detail->save();
            }
        }
        
        return redirect('stock/'.$id);
    }
    
    public function editWarnings($id)
    {
        $station = Station::findOrFail($id);
                
        return view('pages.listStockWarnings',['station' => $station]);
    }
    
    public function updateWarnings(Request $request,$id)
    {
        $station = Station::findOrFail($id);
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

