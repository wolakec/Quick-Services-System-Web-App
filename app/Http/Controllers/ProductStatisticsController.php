<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;

class ProductStatisticsController extends Controller {
    
    public function index()
    {
        $productsTable = Lava::DataTable();
        
        $productsTable->addStringColumn('Sales')
            ->addNumberColumn('Percent');
            
        $sales = DB::table('transaction_details')
                ->where('type','=','sale')
                ->join('packages','transaction_details.package_id','=','packages.id')
                ->join('units','packages.unit_id','=','units.id')
                ->join('products','packages.product_id','=','products.id')
                ->groupBy('package_id')
                ->select(DB::RAW('sum(transaction_details.quantity) as freq, concat(products.name," ",units.name) as name'))
                ->orderBy('freq','desc')
                ->get();
        
       
        foreach($sales as $sale){
            
           $productsTable->addRow(array($sale->name,intval($sale->freq))); 
        }
        
        $chart = Lava::PieChart('Products');
        $chart->datatable($productsTable);
        
        
        return view('pages.viewProductStatistics',['chart' => $chart]);
    }
    
}
