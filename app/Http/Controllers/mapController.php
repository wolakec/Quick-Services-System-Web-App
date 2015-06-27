<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ServiceType;

class mapController extends Controller {


	public function index()
	{
            return view('pages.map');
	}
}