<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Account;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminAcController extends Controller
{
    //POST: ~/admin/change-password
    public function updatePass(Request $req)
    {
        if($req->has('_password')){
            $password = Hash::make($req->_password);
            $id = Session::get('admin_id');
            try
            {
                $data = Admin_Account::where('_id', $id)->first();
                $data->_password = $password;
                $data->save();
                if($data)
                {
                    Session::flash('res_msg', 'password updated');
                    Session::flash('res_class', 'alert-success');
                    return back();
                }
                else
                {
                    Session::flash('res_msg', 'something went wrong, try again');
                    Session::flash('res_class', 'alert-danger');
                    return back();
                }
            }
            catch(\Exception $e)
            {
                Session::flash('res_msg', 'error occurred, try again');
                Session::flash('res_class', 'alert-danger');
                return back();
            }
        }
        else{
            Session::flash('res_msg', 'required parameter missing or invalid');
            Session::flash('res_class', 'alert-danger');
            return back();
        }
    }

    //POST: ~/login
    public function login(Request $req){

    	$username = $req->_username;
    	$password = $req->_password;
 		try
 		{
        	$data = Admin_Account::where('_username', $username)->first();
    		if($data && Hash::check($password, $data['_password']))
        	{
            	$req->session()->put('admin_uname', $data['_username']);
                $req->session()->put('admin_id', $data['_id']);
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
			Session::flash('res_msg', 'error occurred, try again');
            Session::flash('res_class', 'alert-danger');
            Session::flash('res_data', ['_username'=>$username, '_password'=>$password]);
    		return back();
		}
    }

    //GET: ~/logout
    public function logout(){

        Session::flush();
        return redirect('/login');
    }
}
