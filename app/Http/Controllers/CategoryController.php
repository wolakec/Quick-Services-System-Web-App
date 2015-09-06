<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller {


	public function index()
	{
            $categories = Category::all();
            
            $view = view('pages.lookup', ['param' => $categories, 'path' => 'categories']);

            return $view;
	}

	public function store(categoryRequest $request)
	{
            $name = $request->input('name');

            $category = new Category;
            $category->name = $name;
          
            $category->save();

            return redirect('categories');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$category = Category::find($id);
                $view = view('pages.editLookup', ['param' => $category, 'path' => 'categories']);

                return $view;
	}

	public function update($id,Request $request)
	{
            $name = $request->input('name');
            $id = (int)$request->input('id');

            $category = Category::find($id);
            $category->name = $name;

            $category->save();
            return redirect('categories');
	}

	public function destroy($id)
	{
		//
	}

}
