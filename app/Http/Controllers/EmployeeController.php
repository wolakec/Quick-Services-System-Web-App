<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\employeeRequest;
use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Employee;
use App\User;
use App\Role;

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
    
    public function store(employeeRequest $request)
    {
        
        $generated = strtoupper(str_random(8));
        $role = Role::where('name','=','station_employee')->first();
        $user = User::create($request->all());
        $user->password = Hash::make($generated);
        $user->roles()->attach($role);
        $user->save();
        
        $employee = Employee::create($request->all());
        $employee->user()->associate($user);
        $employee->save();
        
     
        return view('pages.summary', ['email' => $user->email, 'password' => $generated,'employee' => $employee]);
    }
   
}
