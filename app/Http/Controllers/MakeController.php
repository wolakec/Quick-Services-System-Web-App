<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Make;

class MakeController extends Controller {


	public function index()
	{
            $makes = Make::all();
            
            $view = view('pages.lookup', ['param' => $makes, 'path' => 'makes']);

            return $view;
	}

	public function store(Request $request)
	{
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
		$make = Make::find($id);
                $view = view('pages.editLookup', ['param' => $make, 'path' => 'makes']);

                return $view;
	}

	public function update($id,Request $request)
	{
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $make = Make::find($id);
            $make->name = $name;

            $make->save();
            return redirect('makes');
	}

	public function destroy($id)
	{
		//
	}

}
