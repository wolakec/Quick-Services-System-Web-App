<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;

class ModelStatisticsController extends Controller {
    
    public function index()
    {
        $modelsTable = Lava::DataTable();
        
        $modelsTable->addStringColumn('models')
            ->addNumberColumn('Percent');
            
        $models = DB::table('vehicles')
                ->join('models','vehicles.model_id','=','models.id')
                ->groupBy('model_id')
                ->select(DB::RAW('count(models.name) as freq, models.name'))
                ->get();
        
        
        foreach($models as $model){
           $modelsTable->addRow(array($model->name,$model->freq)); 
        }
        
        $chart = Lava::PieChart('Models');
        $chart->datatable($modelsTable);
               
        return view('pages.viewModelStatistics',['chart' => $chart]);
    }
    
}
