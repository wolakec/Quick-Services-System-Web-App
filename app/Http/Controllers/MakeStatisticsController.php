<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;

class MakeStatisticsController extends Controller {
    
    public function index()
    {
        $makesTable = Lava::DataTable();
        
        $makesTable->addStringColumn('makes')
            ->addNumberColumn('Percent');
            
        $makes = DB::table('vehicles')
                ->join('models','vehicles.model_id','=','models.id')
                ->join('makes','models.make_id','=','makes.id')
                ->groupBy('make_id')
                ->select(DB::RAW('count(makes.name) as freq, makes.name'))
                ->get();
        
        
        foreach($makes as $make){
           $makesTable->addRow(array($make->name,$make->freq)); 
        }
        
        $chart = Lava::PieChart('Makes');
        $chart->datatable($makesTable);
               
        return view('pages.viewMakeStatistics',['chart' => $chart]);
    }
    
}
