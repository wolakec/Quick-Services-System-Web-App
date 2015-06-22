<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller {
    
    public function index()
    {
        $services = Service::all();
        $services->load('employee','type','vehicle.client','vehicle.model');
        //return $services;
       
        return view('pages.listServices',['services' => $services]);
    }
}
