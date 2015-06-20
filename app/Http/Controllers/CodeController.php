<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\QrCode;

use Qr;
use Storage;

class CodeController extends Controller {
    
    public function index()
    {
        //Storage::put('qrCodes/test.png',Qr::format('png')->size(200)->generate('test'));
    }
   
    public function add()
    {
        return view('pages.addQr');
    }
    
    public function store(Request $request)
    {
        $prefix = $request->input('prefix');
        $quota = (int) $request->input('quota');
        
        $latest = QrCode::orderBy('created_at','desc')->first();
        
        
        for($i = $latest->id + 1; $i <= $quota + $latest->id; $i++){
            $qrString = "$prefix-$i";
            
            $filename = $qrString.".png";
            $random = str_random(5);
            Storage::put('qrCodes/'.$random.$filename,Qr::format('png')->size(200)->generate($qrString));
            $code = new QrCode;
            $code->body = $random.$qrString;
            $code->save();
        }
    }
   
}
