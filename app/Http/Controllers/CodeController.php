<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Location;
use App\Station;
use App\Employee;
use Qr;
use Storage;

class CodeController extends Controller {
    
    public function index()
    {
        Storage::put('qrCodes/test.png',Qr::format('png')->size(200)->generate('test'));
    }
   
   
}
