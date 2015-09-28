<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\codeRequest;
use Illuminate\Http\Request;
use App\QrCode;

use Qr;
use Storage;

class CodeController extends Controller {
    
    public function index()
    {
        $codes = QrCode::all();
        $path = storage_path();
        return view('pages.QrCodes',['codes' => $codes ,'path' => $path]);
    }
   
    public function add()
    {
        return view('pages.addQr');
    }
    
    public function test($id){
        return Qr::size(300)->generate($id);
    }
    
    public function store(codeRequest $request)
    {
        $prefix = $request->input('prefix');
        $quota = (int) $request->input('quota');
        
        $latest = QrCode::orderBy('created_at','desc')->first();
        if(!$latest){
            $begin = 1;
        }else{
            $begin = $latest->id;
        }
        
        for($i = $begin + 1; $i <= $quota + $begin; $i++){
            $qrString = "$prefix-$i";
            
            $filename = $qrString.".png";
            $random = str_random(5);
            Storage::put('qrCodes/'.$random.$filename,Qr::format('png')->size(200)->generate($random.$qrString));
            $code = new QrCode;
            $code->body = $random.$qrString;
            $code->save();
        }
    }
   
}
