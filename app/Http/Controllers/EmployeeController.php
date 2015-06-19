<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Employee;
use Hash;

class EmployeeController extends Controller {
    
    public function index()
    {
        $employees = Employee::all();
        
        return view('pages.listEmployees',['employees' => $employees]);
    }
    
    public function add()
    {
        $locations = Location::all();
        $stations = Station::all();
        
        return view('pages.addEmployee',['locations' => $locations, 'stations' => $stations]);
    }
    
    public function store(Request $request)
    {
        $generated = str_random(14);
        $employee = Employee::create($request->all());
        $employee->password = Hash::make($generated);
        $employee->save();
        
        return view('pages.summary', ['email' => $employee->email, 'password' => $generated]);
    }
   
}
