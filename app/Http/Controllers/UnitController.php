<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller {


	public function index()
	{
            $units = Unit::all();
            
            $view = view('pages.lookup', ['param' => $units, 'path' => 'unit']);

            return $view;
	}

	public function store(Request $request)
	{
            $name = $request->input('name');

            $unit = new Unit;
            $unit->name = $name;
          
            $unit->save();

            return redirect('unit');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$unit = Unit::find($id);
                $view = view('pages.editLookup', ['param' => $unit, 'path' => 'unit']);

                return $view;
	}

	public function update($id,Request $request)
	{
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $unit = Unit::find($id);
            $unit->name = $name;

            $unit->save();
            return redirect('unit');
	}

	public function destroy($id)
	{
		//
	}

}
