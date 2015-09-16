<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
         return view('pages.changePassword');
    }

    public function update(Request $request)
    {
        $user = $request->user();
        
        $password = $user->password;

        if(!hash::check($request->old_password,$password)){
            return redirect('/changepassword');
        }

        $password = hash::make($request->new_password);
        $user->password = $password;
        $user->save();
        
        return redirect('/changepassword');
    }

}
