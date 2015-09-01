<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Employee;
use App\ServiceType;

class StationInvoiceController extends Controller {
    
    public function viewDaily($id)
    {
        $station = Station::findOrFail($id);
        
        $details = $station->transactionDetails()->where('transaction_details.created_at', '>=', new \DateTime('today'))->get();
        $details->load('transaction','package.product','package.unit','transaction.station','transaction.employee');
        
        $grandTotal = 0;
        foreach($details as $detail){
            $grandTotal += $detail->total_price;
        }

        return view('pages.viewInvoice',['transactions' => $details, 'grandTotal' => $grandTotal, 'station' => $station]);
    }

}
