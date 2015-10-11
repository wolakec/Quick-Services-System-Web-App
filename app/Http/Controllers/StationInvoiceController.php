<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Location;
use App\Station;
use App\Employee;
use App\ServiceType;

class StationInvoiceController extends Controller {
    
    public function viewDaily($id)
    {
        $station = Station::findOrFail($id);
        
        $details = $station->transactionDetails()->where('transaction_details.created_at', '>=', new \DateTime('today'))
                ->where('transaction_details.type','=','sale')
                ->get();
        $details->load('transaction','package.product','package.unit','transaction.station','transaction.employee');
        
        $grandTotal = 0;
        foreach($details as $detail){
            $grandTotal += $detail->total_price;
        }
        
        $date = Carbon::parse();  
        $companyinfo = \App\CompanyInfo::first();

        return view('pages.viewInvoice',['transactions' => $details, 'grandTotal' => $grandTotal, 'station' => $station, 'date' => $date, 'company' => $companyinfo]);
    }

    public function viewDailyIn($id)
    {
        $station = Station::findOrFail($id);
        
        $details = $station->transactionDetails()->where('transaction_details.created_at', '>=', new \DateTime('today'))
                ->where('transaction_details.type','=','stock')
                ->get();
        $details->load('transaction','package.product','package.unit','transaction.station','transaction.employee');
        
        $grandTotal = 0;
        foreach($details as $detail){
            $grandTotal += $detail->total_price;
        }
        
        $date = Carbon::parse();  
        $companyinfo = \App\CompanyInfo::first();
        
        return view('pages.viewInvoice',['transactions' => $details, 'grandTotal' => $grandTotal, 'station' => $station, 'date' => $date, 'company' => $companyinfo]);
    }
}
