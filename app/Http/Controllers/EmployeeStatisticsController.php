<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Lava;
use DB;

class EmployeeStatisticsController extends Controller {
    
    public function sales()
    {
        $employeeTable = Lava::DataTable();
        
        $employeeTable->addStringColumn('Sales')
            ->addNumberColumn('Percent');
            
        $sales = DB::table('transaction_details')
                ->where('type','=','sale')
                ->join('transactions','transaction_details.transaction_id','=','transactions.id')
                ->join('employees','transactions.employee_id','=','employees.id')
                ->groupBy('transactions.employee_id')
                ->select(DB::RAW('count(employees.name) as freq, employees.name'))
                ->orderBy('freq','desc')
                ->get();
        
        
        //dd($sales);
       
        foreach($sales as $sale){
            
           $employeeTable->addRow(array($sale->name,intval($sale->freq))); 
        }
        
        $chart = Lava::PieChart('Sales');
        $chart->datatable($employeeTable);
        
        
        return view('pages.viewEmployeeSalesStatistics',['chart' => $chart]);
    }
    
    public function listSales()
    {
            
        $sales = DB::table('employees')
                ->join('transactions','employees.id','=','transactions.employee_id')
                ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
                ->where('type','=','sale')
                ->groupBy('transactions.employee_id')
                ->select(DB::RAW('count(employees.name) as freq, employees.name'))
                ->orderBy('freq','desc')
                ->get();
        
        dd($sales);
        
        return view('pages.viewEmployeeSalesStatistics',['chart' => $chart]);
    }
    
     public function salesIncome()
    {
        $employeeTable = Lava::DataTable();
        
        $employeeTable->addStringColumn('Sales')
            ->addNumberColumn('Percent');
            
        $sales = DB::table('transaction_details')
                ->where('type','=','sale')
                ->join('transactions','transaction_details.transaction_id','=','transactions.id')
                ->join('employees','transactions.employee_id','=','employees.id')
                ->groupBy('transactions.employee_id')
                ->select(DB::RAW('sum(transaction_details.total_price) as freq, employees.name'))
                ->orderBy('freq','desc')
                ->get();
        
        
        //dd($sales);
       
        foreach($sales as $sale){
            
           $employeeTable->addRow(array($sale->name,intval($sale->freq))); 
        }
        
        $chart = Lava::PieChart('Sales');
        $chart->datatable($employeeTable);
        
        
        return view('pages.viewEmployeeSalesStatistics',['chart' => $chart]);
    }
    
    public function services()
    {
        $employeeTable = Lava::DataTable();
        
        $employeeTable->addStringColumn('Services')
            ->addNumberColumn('Percent');
            
        $services = DB::table('services')
                ->join('employees','services.employee_id','=','employees.id')
                ->groupBy('services.employee_id')
                ->select(DB::RAW('count(employees.name) as freq, employees.name'))
                ->orderBy('freq','desc')
                ->get();
        
        
        //dd($sales);
       
        foreach($services as $service){
            
           $employeeTable->addRow(array($service->name,intval($service->freq))); 
        }
        
        $chart = Lava::PieChart('Services');
        $chart->datatable($employeeTable);
        
        
        return view('pages.viewEmployeeServicesStatistics',['chart' => $chart]);
    }
    
}
