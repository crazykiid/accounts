<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Account;
use Session;
use Illuminate\Support\Facades\Hash;

class UserAcController extends Controller
{
	// ~/accounts/all
    public function usersAll()
    {
		$data = User_Account::all();
		return view('accounts.all', ['data' => $data]);
    }

	// ~/accounts/lock/{id}
    public function lockUserAc($id)
    {
		try
		{
			$data = User_Account::where('_id', $id)->first();
	    	$data->_status = 0;
	        $data->save();

	    	if($data)
	        {
	            Session::flash('res_msg', 'account locked');
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

	// ~/accounts/unlock/{id}
    public function unlockUserAc($id)
    {
		try
		{
			$data = User_Account::where('_id', $id)->first();
	    	$data->_status = 1;
	        $data->save();

	    	if($data)
	        {
	            Session::flash('res_msg', 'account unlocked');
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

	// ~/accounts/suspend/{id}
    public function suspendUserAc($id)
    {
		try
		{
			$data = User_Account::where('_id', $id)->first();
	    	$data->_status = 9;
	        $data->save();

	    	if($data)
	        {
	            Session::flash('res_msg', 'account suspended');
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

    // ~/accounts/new
    public function createUserAc(Request $req)
    {
    	$u_name = $req->_name;
    	$u_email = $req->_email;
    	$u_contact = $req->_contact;
    	$u_password = Hash::make($req->_password);
		try
		{
	    	$data = new User_Account;
	    	$data->_name = $u_name;
	    	$data->_email = $u_email;
	    	$data->_contact = $u_contact;
	    	$data->_password = $u_password;
	    	$data->_status = 1;
	        $data->save();

	    	if($data)
	        {
	            Session::flash('res_msg', 'account created successfully');
	            Session::flash('res_class', 'alert-success');
	            return back();
	    	}
	    	else
	        {
	            Session::flash('res_msg', 'something went wrong, try again');
	            Session::flash('res_class', 'alert-danger');
	            Session::flash('res_data', ['_name'=>$u_name, '_email' => $u_email, '_contact' => $u_contact, '_password'=> $req->_password]);
	            return back();
	    	}
		}
		catch(\Exception $e)
		{
			Session::flash('res_msg', 'error occurred, try again');
            Session::flash('res_class', 'alert-danger');
            Session::flash('res_data', ['_name'=>$u_name, '_email' => $u_email, '_contact' => $u_contact, '_password'=> $req->_password]);
    		return back();
		}
    }
}
