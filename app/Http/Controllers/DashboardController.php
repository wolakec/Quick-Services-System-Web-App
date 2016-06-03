<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Lava;
use PushNotification;

use Qr;
use Storage;

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
            
            $alerts = Alert::where('status','=','pending')->where('station_id','=',$station->id)->count();
            
            return view('pages.employeehomepage',['station' => $station, 'salesVal' => $salesVal, 'alerts' => $alerts, 'noSales' => $noSales]);
        }
    }
   public function second()
    {
        $table = Lava::DataTable();
        
        return view('pages.secondDashboard');
    }
    
    public function testForm()
    {
        $token = "doctWuqtouQ:APA91bHzld5NmFpyP1g4vZRTea2hlS7rJhsDczEc66fcZPGqqX2_oxnqwoT6j49pt-J6CQdNgKWY1uDhfCw6LXTX71P0pjxe23YwgwLcFNZU7AkMEXrufmmfk_3ucUWncmzoTx4zXfob";
        
        $message = PushNotification::Message("dsad",
                    array('title' => "sddad",
                        'type' => 'service',
                        )
                    );
                
                $push = PushNotification::app('qssClient')
                        ->to($token)
                        ->send($message);
        
        
        $response = $push->adapter->getResponse();
        dd($push);
        dd($response);
        
        //echo $response;
        //echo "moo";
        //return view('pages.testform');
    }
    
    public function generate()
    {
        $appname = "testapp.png";
        $url = "http://192.168.1.131/images/app.apk";
        Storage::put('images/'.$appname,Qr::format('png')->size(200)->generate($url));
        
    }
}
