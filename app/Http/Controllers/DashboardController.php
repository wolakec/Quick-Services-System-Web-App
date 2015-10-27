<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Lava;
use PushNotification;

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
            
            $salesVal = DB::table('transactions')
                ->where('station_id','=',$station->id)
                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                ->where('transaction_details.type','=','sale')
                ->where('transaction_details.created_at', '>=', new \DateTime('today'))
                ->sum('transaction_details.total_price');
            
            $noSales = DB::table('transactions')
                ->where('station_id','=',$station->id)
                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                ->where('transaction_details.type','=','sale')
                ->where('transaction_details.created_at', '>=', new \DateTime('today'))
                ->count();
            
            $alerts = Alert::where('status','=','pending')->count();
            
            return view('pages.employeehomepage',['station' => $station, 'salesVal' => $salesVal, 'noSales' => $noSales]);
        }
    }
   public function second()
    {
        $table = Lava::DataTable();
        
        return view('pages.secondDashboard');
    }
    
    public function testForm()
    {
        $token = "fgD2bZD93ms:APA91bGLZy7djyGZ-XPkPEJWbup8P_RpGJMTXFcDVVUppF_YSeNWsOyr6A4-IerXhXn5j1WkDJkXzDH3nz6O_FvcONYRh_XSr_749zqI77qtfj1D41qmTqlxaIPRvtjfZgF5F1mzywX7";
        dd(strlen($token));
        
        $push = PushNotification::app('qssClient')
                ->to($token)
                ->send('Insert rude message here');
        
        
        $response = $push->adapter->getResponse();
        dd($response);
        
        //echo $response;
        //echo "moo";
        //return view('pages.testform');
    }
}
