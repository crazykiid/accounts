<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard
	function index()
	{
		return view('dashboard');
	}
	
	// add new
	function addAccount(request $req)
	{
		return $req;
	}

	function viewAccounts()
	{
		$data = [];
		return view('all_accounts', $data);
	}

	// setting
	function adminDetails()
	{
		return view('admin_details');
	}

	function adminChangePassword()
	{
		return view('admin_change_password');
	}

}
