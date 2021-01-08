<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AccountController extends Controller
{
    // ~/login
    public function login(Request $req){

    	$username = $req->_username;
    	$password = $req->_password;
    	if($username == 'admin' && $password == 'admin'){

            $req->session()->put('username', $username);
    		return redirect('/');
    	}
    	else{
            Session::flash('res_msg', 'username or password is incorrect');
            Session::flash('res_class', 'alert-danger'); 
    		return redirect('/login');
    	}
    }
    public function logout(){

        Session::flush();
        return redirect('/login');
    }
}
