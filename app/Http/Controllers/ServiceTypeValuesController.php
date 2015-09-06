<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\serviceValueRequest;
use Illuminate\Http\Request;
use App\ServiceType;
use App\ServiceTypeValue;

class ServiceTypeValuesController extends Controller {
    
    public function index()
    {
        $values = ServiceTypeValue::all();
        $values->load('type');
       
        return view('pages.listServiceTypeValues', ['values' => $values]);
    }
    
    public function add()
    {
        $types = ServiceType::all();
        
        return view('pages.addServiceTypeValue', ['serviceTypes' => $types]);
    }
    
    public function store(serviceValueRequest $request)
    {
        $value = ServiceTypeValue::create($request->all());
        $value->save();
        
        return redirect('services/values');
    }
    
}
