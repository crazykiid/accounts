<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Account;
use Session;
use Illuminate\Support\Facades\Hash;

class UserAcController extends Controller
{
	//GET: ~/accounts/all
    public function usersAll()
    {
    	//all();
		$data = User_Account::orderBy('_id', 'desc')->get()->makeHidden(['_password']);
		return view('accounts.all', ['data' => $data]);
    }

	//GET: ~/accounts/active
    public function usersAct()
    {
    	//all();
		$data = User_Account::where('_status', 1)->orderBy('_id', 'desc')->get()->makeHidden(['_password']);
		return view('accounts.active', ['data' => $data]);
    }

	//GET: ~/accounts/inactive
    public function usersDct()
    {
    	//all();
		$data = User_Account::where('_status', 0)->orderBy('_id', 'desc')->get()->makeHidden(['_password']);
		return view('accounts.inactive', ['data' => $data]);
    }

	//POST: ~/accounts/search
    public function searchUserAc(Request $req)
    {
    	if($req->has('q'))
    	{
    		$q = $req->q;   	
	    	try
			{
	    		if($req->has('s') && $req->s == 1)
	    		{
	    			$data = User_Account::where('_name', 'LIKE', "%{$q}%")->where('_status', 1)->get()->makeHidden(['_password']);
	    		}
	    		elseif($req->has('s') && $req->s == 0)
	    		{
	    			$data = User_Account::where('_name', 'LIKE', "%{$q}%")->where('_status', 0)->get()->makeHidden(['_password']);
	    		}
	    		else
	    		{
					$data = User_Account::where('_name', 'LIKE', "%{$q}%")->get()->makeHidden(['_password']);
	    		}

		    	if($data)
		        {
		            return response()->json(['msg' => 'success', 'data' => $data, 'status' => 200]);
		    	}
		    	else
		        {
		            return response()->json(['msg' => 'success', 'data' => $data, 'status' => 200]);
		    	}
			}
			catch(\Exception $e)
			{
				return response()->json(['msg' => 'something went wrong. try again.', 'data' => '', 'status' => 500], 500);
			}
    	}
    	else{
			return response()->json(['msg' => 'required parameter missing or invalid.', 'data' => '', 'status' => 400], 400);
    	}
    }

	//GET: ~/accounts/update-basic/{id}
    public function editBasicUserAc($id)
    {
		try
		{
			$data = User_Account::where('_id', $id)->first();
			return view('accounts.edit', ['data' => $data]);
		}
		catch(\Exception $e)
		{
			Session::flash('res_msg', 'error occurred, try again');
            Session::flash('res_class', 'alert-danger');
    		return back();
		}
    }

	//POST: ~/accounts/update-basic/{id}
    public function updateBasicUserAc(Request $req, $id)
    {
    	if($req->has('_name', '_email', '_contact')){
    		$name = $req->_name;
    		$email = $req->_email;
    		$contact = $req->_contact;
			try
			{
				$data = User_Account::where('_id', $id)->first();
				$data->_name = $name;
				$data->_email = $email;
				$data->_contact = $contact;
				$data->save();
				if($data)
		        {
		            Session::flash('res_msg', 'account updated');
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

	//POST: ~/accounts/update-basic/{id}/password
    public function updatePassUserAc(Request $req, $id)
    {
    	if($req->has('_password') && strlen($req->_password) > 0){
    		$password = Hash::make($req->_password);
			try
			{
				$data = User_Account::where('_id', $id)->first();
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

	//GET: ~/accounts/lock/{id}
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

	//GET: ~/accounts/unlock/{id}
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

	//GET: ~/accounts/suspend/{id}
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

	//GET: ~/accounts/activate/{id}
    public function activateUserAc($id)
    {
		try
		{
			$data = User_Account::where('_id', $id)->first();
	    	$data->_status = 1;
	        $data->save();

	    	if($data)
	        {
	            Session::flash('res_msg', 'account activated');
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

    //POST: ~/accounts/new
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
