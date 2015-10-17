<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\modelRequest;
use Illuminate\Http\Request;
use App\Make;
use App\VehicleModel;


class ModelController extends Controller {
    
    public function index()
    {
        $models = VehicleModel::simplePaginate(8);
        
        return view('pages.listModels',['models' => $models]);
    }
    
    public function add()
    {
        $makes = Make::all();
        
        return view('pages.addModel',['makes' => $makes]);
    }
    
    public function store(modelRequest $request)
    {
        $model = VehicleModel::create($request->all());
        $model->save();
        
        return redirect('models');
    }
    
    public function edit($id)
    {
        $model = VehicleModel::findOrFail($id);
        
        $this->authorize('editModel',$model);
        $model->load('make');

        $makes = Make::all();

        $view = view('pages.editModel', ['param' => $model, 'makes' => $makes]);

        return $view;
                
    }
    
    public function update($id,Request $request)
    {
        $model = VehicleModel::findOrFail($id);
        
        $this->authorize('editModel',$model);
        
        $name = $request->input('name');
        $id = (int)$request->input('id');


        $model->name = $name;
        $model->make_id = $request->input('make_id');

        $model->save();
        return redirect('models');
    }
   
}
