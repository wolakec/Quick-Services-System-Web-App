<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Unit;
use App\Category;
use App\Product;
use App\Alert;
use App\Package;
use App\Transaction;
use App\TransactionDetail;
use App\Stock;
use Auth;

class TransactionController extends Controller {

	public function index()
	{
                $user = Auth::user();
                
                if($user->isAdmin()){
                    $transactions = Transaction::all();
                }
                
                if($user->isEmployee()){
                    $transactions = Transaction::where('station_id','=',$user->employee->station->id)->get();
                }
                
                $transactions->load('employee','station');
                
                return view('pages.listTransactions',['transactions' => $transactions]);
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
                
                $warning = false;
                if($stock){
                    if($stock->quantity > 0){
                        $oldStock = $stock->quantity;
                        if(($stock->quantity - $detail->quantity) < 0){
                            $stock->quantity = 0;
                            $stock->save();
                            $warning = true;
                        }else{
                            $stock->decrement('quantity',$detail->quantity);
                            if(($oldStock > $stock->warning_level) && ($stock->quantity <= $stock->warning_level)){
                                $warning = true;

                               
                            }
                        }
                    }
                    
                    if($warning){
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
            }
            
            return redirect('/transactions/'.$transaction->id.'/invoice');
	}
        
        public function view($id)
        {
            $transaction = Transaction::findOrFail($id);
            $companyinfo = \App\CompanyInfo::first();
            
            $details = $transaction->details;
            $details->load('transaction','package.product','package.unit','transaction.station','transaction.employee');
        
            $grandTotal = 0;
            foreach($details as $detail){
                $grandTotal += $detail->total_price;
            }
             $date = Carbon::parse();  
            return view('pages.viewInvoice',['date' =>$date,'transactions' => $details, 'grandTotal' => $grandTotal, 'station' => $transaction->station, 'company' => $companyinfo]);
          
        }
     

}
