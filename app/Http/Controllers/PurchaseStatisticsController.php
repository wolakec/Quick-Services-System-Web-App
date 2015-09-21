<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;
use Carbon\Carbon;

class PurchaseStatisticsController extends Controller {
    
    public function index()
    {
        $today = Carbon::today()->toDateTimeString();
        $salesTable = Lava::DataTable();
        
        $salesTable->addDateColumn('date')
            ->addNumberColumn('Purchase');
            
        $sales = DB::table('transaction_details')
                ->where('type','=','stock')
                ->where('created_at','<=',$today)
                ->select(DB::RAW('total_price, date(created_at) as date'))
                //->groupBy(DB::RAW('date(created_at)'))
                //->orderBy('freq','desc')
                ->get();
        
        $sales = collect($sales);
        $sales = $sales->groupBy('date');
        
        foreach($sales as $sale){
            $total = 0;
            foreach($sale as $transaction){
                $total += $transaction->total_price;
            }
            $sale->total_price = $total;
        }
        //dd($sales);
        
        foreach($sales as $key => $sale){
           $salesTable->addRow(array($key, $sale->total_price)); 
        }
        
        $chart = Lava::LineChart('Purchases');
        $chart->datatable($salesTable);
        
        
        return view('pages.viewWeeklyPurchaseStatistics',['chart' => $chart]);
    }
    
   
}
