<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller {


	public function index()
	{
            $locations = Location::all();
            
            $view = view('pages.lookup', ['param' => $locations, 'path' => 'locations']);

            return $view;
	}

	public function store(Request $request)
	{
            $name = $request->input('name');

            $location = new Location;
            $location->name = $name;
          
            $location->save();

            return redirect('locations');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$location = Location::find($id);
                $view = view('pages.editLookup', ['param' => $location, 'path' => 'locations']);

                return $view;
	}

	public function update($id,Request $request)
	{
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $location = Location::find($id);
            $location->name = $name;

            $location->save();
            return redirect('locations');
	}

	public function destroy($id)
	{
		//
	}

}
