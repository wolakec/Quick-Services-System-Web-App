<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Unit;
use App\Category;
use App\Product;
use App\Package;

class TransactionController extends Controller {

	public function index()
	{
           
	}

	public function add()
	{
                $packages = Package::with('unit','product','product.category')->get();
                
                
		return view('pages.addTransaction',['packages' => $packages]);
	}

	public function store(Request $request)
	{
           
	}
     

}
