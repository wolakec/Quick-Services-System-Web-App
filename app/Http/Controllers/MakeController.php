<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\makeRequest;
use Illuminate\Http\Request;
use App\Make;

class MakeController extends Controller {


	public function index()
	{
            $makes = Make::all();
            
            $view = view('pages.lookup', ['param' => $makes, 'path' => 'makes', 'title' => 'Cars Makes', 'input' => 'Add New Make']);

            return $view;
	}

	public function store(makeRequest $request)
	{
            $this->authorize('addMake',[]);
            
            $name = $request->input('name');

            $make = new Make;
            $make->name = $name;
          
            $make->save();

            return redirect('makes');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
            $make = Make::findOrFail($id);
            
            $this->authorize('editMake',$make);
            
            
            $view = view('pages.editLookup', ['param' => $make, 'path' => 'makes', 'title' => 'Edit Cars Makes', 'input' => 'Edit Car Make']);

            return $view;
	}

	public function update($id,Request $request)
	{
            $make = Make::findOrFail($id);
            $this->authorize('editMake',$make);
             
            $name = $request->input('name');
            $id = (int)$request->input('id');

            
            $make->name = $name;

            $make->save();
            return redirect('makes');
	}

	public function destroy($id)
	{
		//
	}

}
