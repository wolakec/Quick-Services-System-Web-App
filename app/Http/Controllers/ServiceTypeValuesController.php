<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\serviceValueRequest;
use Illuminate\Http\Request;
use App\ServiceType;
use App\ServiceTypeValue;
use App\Service;

class ServiceTypeValuesController extends Controller {
    
    public function index()
    {
        $values = ServiceTypeValue::all();
        $values->load('type');
       
        return view('pages.listServiceTypeValues', ['values' => $values]);
    }
    
    public function add()
    {
        $this->authorize('createServiceValue');
        $values = ServiceTypeValue::all('service_type_id');
       
        $types = ServiceType::whereNotIn('id',$values)->get();
        
        return view('pages.addServiceTypeValue', ['serviceTypes' => $types]);
    }
    
    public function store(serviceValueRequest $request)
    {
        $value = ServiceTypeValue::create($request->all());
        $value->save();
        
        return redirect('services/values');
    }
    
    public function edit($id)
    {
        
        $value = ServiceTypeValue::findOrFail($id);
        $this->authorize('edit',$value);
        return view('pages.editServiceTypeValue', ['value' => $value]);
    }
    
    public function update(Request $request, $id)
    {
        $value = ServiceTypeValue::findOrFail($id);
        $value->update($request->all());
        $this->authorize('edit',$value);
        return redirect('services/values');
    }
    
}
