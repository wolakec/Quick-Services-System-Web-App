<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Employee;
use Hash; 

class AppEmployeeController extends Controller {
    
    public function login(Request $request) 
    {
        $input = $request->all();
        $email = $input['email'];
        $password = $input['password'];
        $data = [];
        
        $employee = Employee::where('email', '=', $email)->first();

        if($employee){
            if(hash::check($password,$employee->password)){
                return response()->json(['status' => 'true', 'id' => $employee->id]);       
            }else{
                return response()->json(['status' => 'false', 'id' => null]);
            }
        }else{
            return response()->json(['status' => 'false', 'id' => null]);
        }
    }
    
    public function changePass(Request $request, $id)
    {
        $employee = Employee::find($id);
        
        if(!$employee){
            return response()->json(['status' => 'false']);
        }
        
        $oldPassword = $request->input('oldpassword');
        
        if(!hash::check($oldPassword,$employee->password)){
            return response()->json(['status' => 'false']);
        }
        
        $password = hash::make($request->input('newpassword'));
        $employee->password = $password;
        $employee->save();
            
        return response()->json(['status' => 'true']);
    }
    
    public function viewServiceTypes($id)
    {
        $employee = Employee::find($id);
        
        return $employee->station->serviceTypes;
    }
   
}
