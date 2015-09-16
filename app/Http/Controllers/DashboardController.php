<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Lava;

use App\TransactionDetail;
use App\Client;
use App\Alert;
use Auth;
use DB;

class DashboardController extends Controller {
    
    public function index()
    {
        $user = Auth::user();
        
        if($user->isAdmin()){
        
            $noSales = TransactionDetail::where('transaction_details.created_at', '>=', new \DateTime('today'))
                    ->where('transaction_details.type','=','sale')
                    ->count();

            $newClients = Client::where('created_at', '>=', new \DateTime('today'))
                    ->count();

            $salesVal = TransactionDetail::where('transaction_details.created_at', '>=', new \DateTime('today'))
                    ->where('transaction_details.type','=','sale')
                    ->sum('total_price');

            $alerts = Alert::where('status','=','pending')->count();

            return view('pages.home',['noSales' => $noSales, 'salesVal' => $salesVal, 'newClients' => $newClients, 'alerts' => $alerts]);
        }
        
        if($user->isEmployee()){
            
            $station = $user->employee->station;
            
//            $noSales = TransactionDetail::where('transaction_details.created_at', '>=', new \DateTime('today'))
//                    ->where('transaction_details.type','=','sale')
//                    ->count();
//
//            $newClients = Client::where('created_at', '>=', new \DateTime('today'))
//                    ->count();

            $salesVal = DB::table('transactions')
                ->where('station_id','=',$station->id)
                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                ->where('transaction_details.type','=','sale')
                ->where('transaction_details.created_at', '>=', new \DateTime('today'))
                ->select(DB::RAW('sum(transaction_details.total_price) as total'))
                ->get();
            
            $alerts = Alert::where('status','=','pending')->count();
            
            return view('pages.employeehomepage',['station' => $station, 'salesVal' => $salesVal[0]->total]);
        }
    }
   public function second()
    {
        $table = Lava::DataTable();
        
        return view('pages.secondDashboard');
    }
}
