<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Lava;


class DashboardController extends Controller {
    
    public function index()
    {
        $table = Lava::DataTable();
        
        return view('pages.home');
    }
   
}
