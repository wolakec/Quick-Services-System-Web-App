<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;
use Carbon\Carbon;

class SalesStatisticsController extends Controller {
    
    public function index()
    {
        $today = Carbon::today()->toDateTimeString();
        $salesTable = Lava::DataTable();
        
        $salesTable->addDateColumn('date')
            ->addNumberColumn('Income');
            
        $sales = DB::table('transaction_details')
                ->where('type','=','sale')
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
        
        $chart = Lava::LineChart('Sales');
        $chart->datatable($salesTable);
        
        
        return view('pages.viewWeeklySalesStatistics',['chart' => $chart]);
    }
    
    public function withPurchases()
    {
        $today = Carbon::today()->subWeek()->toDateTimeString();
        //dd($today);
        $salesTable = Lava::DataTable();
        
        $salesTable->addDateColumn('date')
            ->addNumberColumn('Income')
            ->addNumberColumn('Purchases');
            
        $sales = DB::table('transaction_details')
                ->where('created_at','>=',$today)
                ->select(DB::RAW('total_price, date(created_at) as date, type'))
                //->groupBy(DB::RAW('date(created_at)'))
                //->orderBy('freq','desc')
                ->get();
        
        //dd($sales);
        
        $sales = collect($sales);
        $sales = $sales->groupBy('date');
        
        foreach($sales as $sale){
            $total = 0;
            $totalPurchase = 0;
            foreach($sale as $transaction){
                if($transaction->type == "sale"){
                    $total += $transaction->total_price;
                }
                
                if($transaction->type == "stock"){
                    $totalPurchase += $transaction->total_price;
                }
            }
            $sale->total_price = $total;
            $sale->total_purchase = $totalPurchase;
        }
        //dd($sales);
        
        foreach($sales as $key => $sale){
           $salesTable->addRow(array($key, $sale->total_price, $sale->total_purchase)); 
        }
        
        $chart = Lava::LineChart('Sales');
        $chart->datatable($salesTable);
        
        
        return view('pages.viewWeeklySalesStatistics',['chart' => $chart]);
    }
    
}
