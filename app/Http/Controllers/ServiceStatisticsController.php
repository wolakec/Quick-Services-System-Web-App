<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;

class ServiceStatisticsController extends Controller {
    
    public function index()
    {
        $servicesTable = Lava::DataTable();
        
        $servicesTable->addStringColumn('Services')
            ->addNumberColumn('Percent');
            
        $serviceTypes = DB::table('services')
                ->join('service_types','services.service_type_id','=','service_types.id')
                ->groupBy('service_type_id')
                ->select(DB::RAW('count(service_types.name) as freq, service_types.name'))
                ->get();
        
        
        foreach($serviceTypes as $type){
           $servicesTable->addRow(array($type->name,$type->freq)); 
        }
        
        $chart = Lava::PieChart('Services');
        $chart->datatable($servicesTable);
      
        return view('pages.viewServiceStatistics',['chart' => $chart]);
    }
    
}
