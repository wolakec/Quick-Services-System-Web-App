<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Unit;
use App\Category;
use App\Product;
use App\Package;
use App\Transaction;
use App\TransactionDetail;
use App\Stock;

class TransactionController extends Controller {

	public function index()
	{
           
	}

	public function add()
	{
                $packages = Package::with('unit','product','product.category')->get();
                
                
		return view('pages.addTransaction',['packages' => $packages]);
	}

	public function store(Request $request)
	{
            
            $user = $request->user();
            
            if(!$user->employee){
                return redirect('/');
            }
            
            $transaction = new Transaction;
            $transaction->employee_id = $user->employee->id;
            $transaction->station_id = $user->employee->station_id;
            $transaction->save();
            
            $input = $request->all();
            
            $packages = $input['packages'];
            
            foreach($packages as $package){
                $detail = TransactionDetail::create($package);
                $detail->price = $detail->package->base_price;
                $detail->total_price = $detail->package->base_price * $detail->quantity;
                $detail->transaction_id = $transaction->id;
                $detail->save();
                
                
                Stock::where('station_id',$user->employee->station_id)
                       ->where('package_id',$detail->package_id)
                        ->decrement('quantity',$detail->quantity);
            }
	}
     

}
