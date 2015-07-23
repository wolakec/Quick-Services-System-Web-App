<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Unit;
use App\Category;
use App\Product;
use App\Package;

class ProductController extends Controller {

	public function index()
	{
           $products = Product::with(['category', 'packages.unit'])->get();
           
           return view('pages.listProducts',['products' => $products]);
	}

	public function create()
	{
                $units = Unit::all();
                $categories = Category::all();
		return view('pages.addProduct',['units' => $units, 'categories' => $categories]);
	}

	public function store(Request $request)
	{
            $input = $request->all();
            $product = Product::create($request->all());
            $prices = $input['packages'];
            $packages = array();
            foreach($prices as $price){          
                $packages[] = new Package($price);
            }
            
            $product->packages()->saveMany($packages);
            
            return redirect('product');
	}
        
        /*
         * Edit - work in progress
         */
	public function edit($id)
	{
            $product = Product::find($id);
            $product->load('packages');
            $units = Unit::all();
            $categories = Category::all();
            
            return view('pages.editProduct',['product' => $product,'id' => $id,'units' => $units, 'categories' => $categories]);
	}

	public function update($id)
	{
		//
	}

	
	public function destroy($id)
	{
		//
	}
        
        public function listPackages($id)
        {
            $product = Product::find($id);
            
            $packages = $product->packages;
            $packages->load('unit');
            
            return $packages;
        }

}
