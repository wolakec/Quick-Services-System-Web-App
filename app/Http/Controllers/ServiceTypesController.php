<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\serviceRequest;
use Illuminate\Http\Request;
use App\ServiceType;

class ServiceTypesController extends Controller {


	public function index()
	{
            $this->authorize('createServiceTypes');
            $types = ServiceType::all();
            
            $view = view('pages.lookup', ['param' => $types, 'path' => 'services/types']);

            return $view;
	}

	public function store(Request $request)
	{
            $name = $request->input('name');

            $type = new ServiceType;
            $type->name = $name;
            $type->save();

            return redirect('services/types');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$type = ServiceType::findOrFail($id);
                $view = view('pages.editLookup', ['param' => $type, 'path' => 'services/types']);
                $this->authorize('edit',$type);

                return $view;
	}

	public function update($id,Request $request)
	{
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $type = ServiceType::findOrFail($id);
            $type->name = $name;
            
            $this->authorize('edit',$type);

            
            $type->save();
            return redirect('services/types');
	}

	public function destroy($id)
	{
		//
	}

}
