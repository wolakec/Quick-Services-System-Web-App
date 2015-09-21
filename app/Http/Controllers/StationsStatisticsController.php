<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;

class StationsStatisticsController extends Controller {
    
    public function services()
    {
        $servicesTable = Lava::DataTable();
        
        $servicesTable->addStringColumn('Services')
            ->addNumberColumn('Percent');
            
        $serviceTypes = DB::table('services')
                ->join('stations','services.station_id','=','stations.id')
                ->groupBy('station_id')
                ->select(DB::RAW('count(stations.name) as freq, stations.name'))
                ->get();
        
        
        foreach($serviceTypes as $type){
           $servicesTable->addRow(array($type->name,$type->freq)); 
        }
        
        $chart = Lava::PieChart('Services');
        $chart->datatable($servicesTable);
               
        return view('pages.viewStationServiceStatistics',['chart' => $chart]);
    }
    
    public function sales()
    {
        $salesTable = Lava::DataTable();
        
        $salesTable->addStringColumn('Sales')
            ->addNumberColumn('Percent');
            
        $sales = DB::table('transaction_details')
                ->where('type','=','sale')
                ->join('transactions','transaction_details.transaction_id','=','transactions.id')
                ->join('stations','transactions.station_id','=','stations.id')
                ->groupBy('station_id')
                ->select(DB::RAW('count(stations.name) as freq, stations.name'))
                ->orderBy('freq','desc')
                ->get();
        
        
        foreach($sales as $sale){
           $salesTable->addRow(array($sale->name,$sale->freq)); 
        }
        
        $chart = Lava::PieChart('Sales');
        $chart->datatable($salesTable);
               
        return view('pages.viewStationSaleStatistics',['chart' => $chart]);
    }
    
}
