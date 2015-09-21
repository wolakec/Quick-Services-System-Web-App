<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\serviceValueRequest;
use Illuminate\Http\Request;
use App\ServiceType;
use App\ServiceTypeValue;
use App\Service;
use App\Category;

class ServiceTypeCategoriesController extends Controller {
    
    public function index()
    {
        $values = ServiceType::all();
        //$values->load('type');
       
        return view('pages.listServiceTypeCategories', ['serviceTypes' => $values]);
    }

    
    public function edit($id)
    {
       
        $type = ServiceType::findOrFail($id);
        $this->authorize('edit',$type);
        
        $type->load('categories');
        
        $categories = Category::all();
        
        return view('pages.editServiceTypeCategories', ['type' => $type, 'categories' => $categories]);
    }
    
    public function update(Request $request, $id)
    {
        $type = ServiceType::findOrFail($id);
        
        $type->categories()->sync($request->input('category_id'));
        
        return redirect('/services/categories/');
    }
    
}
