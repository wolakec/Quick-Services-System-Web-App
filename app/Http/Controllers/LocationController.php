<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller {


	public function index()
	{
            $locations = Location::simplePaginate(10);
            
            $view = view('pages.lookup', ['param' => $locations, 'path' => 'locations', 'title' => 'Locations', 'input' => 'Add New Location']);

            return $view;
	}

	public function store(Request $request)
	{
            $this->authorize(new Location);
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
		$location = Location::findOrFail($id);
                $this->authorize($location);
                $view = view('pages.editLookup', ['param' => $location, 'path' => 'locations', 'title' => 'Edit Locations', 'input' => 'Edit Location']);

                return $view;
	}

	public function update($id,Request $request)
	{
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $location = Location::findOrFail($id);
            $this->authorize($location);
            $location->name = $name;

            $location->save();
            return redirect('locations');
	}

	public function destroy($id)
	{
		//
	}

}
