<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Make;
use App\VehicleModel;


class ModelController extends Controller {
    
    public function index()
    {
        $models = VehicleModel::all();
        
        return view('pages.listModels',['models' => $models]);
    }
    
    public function add()
    {
        $makes = Make::all();
        
        return view('pages.addModel',['makes' => $makes]);
    }
    
    public function store(Request $request)
    {
        $model = VehicleModel::create($request->all());
        $model->save();
        
        return redirect('models');
    }
    
    public function edit($id)
    {
        $model = VehicleModel::find($id);
        $model->load('make');

        $makes = Make::all();

        $view = view('pages.editModel', ['param' => $model, 'makes' => $makes]);

        return $view;
                
    }
    
    public function update($id,Request $request)
    {
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $model = VehicleModel::find($id);
            $model->name = $name;
            $model->make_id = $request->input('make_id');

            $model->save();
            return redirect('models');
    }
   
}
