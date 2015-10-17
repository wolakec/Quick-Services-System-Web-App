<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use Illuminate\Http\Request;

use App\Unit;
use App\Category;
use App\Product;
use App\Package;

class ProductController extends Controller {

	public function index()
	{
           $products = Product::with(['category', 'packages.unit'])->simplePaginate(10);
           
           return view('pages.listProducts',['products' => $products]);
	}

	public function create()
	{
                $this->authorize('createproducts');
                
                $units = Unit::all();
                $categories = Category::all();
		return view('pages.addProduct',['units' => $units, 'categories' => $categories]);
	}

	public function store(productRequest $request)
	{
            //dd($request->all());
            
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
        
        
	public function edit($id)
	{
            $product = Product::findOrFail($id);
            $product->load('packages');
            $units = Unit::all();
            $categories = Category::all();
            
            $this->authorize('edit',$product);
            
            return view('pages.editProduct',['product' => $product,'id' => $id,'units' => $units, 'categories' => $categories]);
	}

	public function update(Request $request,$id)
	{
            $product = Product::findOrFail($id);
            $product->update($request->all());
            $input = $request->all();
            
            if(isset($input['new_packages'])){
                $prices = $input['new_packages'];
                $packages = array();
                $has = false;
                foreach($prices as $price){          
                    $packages[] = new Package($price);
                    $has = true;
                }
                if($has){
                    $product->packages()->saveMany($packages);
                }
            }
            
            $prices = $input['packages'];
           
            foreach($prices as $price){          
                $package = Package::find($price['id']);
                $package->update($price);
            }
            
            return redirect('product');
	}

        public function listPackages($id)
        {
            $product = Product::find($id);
            
            $packages = $product->packages;
            $packages->load('unit');
            
            return $packages;
        }
        
        public function listAllPackages()
        {
            return Package::with('unit','product','product.category')->get();
        }

}
