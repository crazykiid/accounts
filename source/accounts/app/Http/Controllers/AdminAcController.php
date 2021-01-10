<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Account;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminAcController extends Controller
{
    // ~/login
    public function login(Request $req){

    	$username = $req->_username;
    	$password = $req->_password;
 		try
 		{
        	$data = Admin_Account::where('_username', $username)->first();
    		if($data && Hash::check($password, $data['_password']))
        	{
            	$req->session()->put('admin_uname', $data['_username']);
    			return redirect('/');
    		}
    		else
        	{
            	Session::flash('res_msg', 'username or password is incorrect');
            	Session::flash('res_class', 'alert-danger');
            	Session::flash('res_data', ['_username'=>$username, '_password'=>$password]);
    			return back();
    		}
    	}
    	catch(\Exception $e)
		{
			//dd($e);
			Session::flash('res_msg', 'error occurred, try again');
            Session::flash('res_class', 'alert-danger');
            Session::flash('res_data', ['_username'=>$username, '_password'=>$password]);
    		return back();
		}
    }

    // ~/logout
    public function logout(){

        Session::flush();
        return redirect('/login');
    }
}
