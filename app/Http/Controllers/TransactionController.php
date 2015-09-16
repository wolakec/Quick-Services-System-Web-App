<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Unit;
use App\Category;
use App\Product;
use App\Alert;
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
                $detail->type = "sale";
                $detail->save();
                
                
                $stock = Stock::where('station_id',$user->employee->station_id)
                       ->where('package_id',$detail->package_id)->first();
                
                /*
                 * We create an alert if the stock was above the warning level before the transaction
                 * but now below the warning level. This is so that we do not continue to create notifications
                 * for stock that has already dropped below the warning level
                 */
                $oldStock = $stock->quantity;
                $stock->decrement('quantity',$detail->quantity);
                if(($oldStock > $stock->warning_level) && ($stock->quantity <= $stock->warning_level)){
                    
                    
                    $alert = new Alert;
                    $alert->title = "Low Stock at ". $user->employee->station->name;
                    $alert->message = "Product: ". $detail->package->product->name ." ". $detail->package->unit->name ." has triggered a warning level"
                            . "at ". $user->employee->station->name;
                    $alert->station_id = $user->employee->station_id;
                    $alert->employee_id = $user->employee->id;
                    $alert->package_id = $detail->package_id;
                    
                    $alert->type = "stock_warning";
                    $alert->status = "pending";
                    
                    $alert->save();
                }
            }
            
            return redirect('/transactions/'.$transaction->id.'/invoice');
	}
        
        public function view($id)
        {
            $transaction = Transaction::findOrFail($id);
            
            
            $details = $transaction->details;
            $details->load('transaction','package.product','package.unit','transaction.station','transaction.employee');
        
            $grandTotal = 0;
            foreach($details as $detail){
                $grandTotal += $detail->total_price;
            }
            
            return view('pages.viewInvoice',['transactions' => $details, 'grandTotal' => $grandTotal, 'station' => $transaction->station]);
        }
     

}
