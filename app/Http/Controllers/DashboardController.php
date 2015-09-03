<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Lava;

use App\TransactionDetail;
use App\Client;
use App\Alert;

class DashboardController extends Controller {
    
    public function index()
    {
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
   
}
