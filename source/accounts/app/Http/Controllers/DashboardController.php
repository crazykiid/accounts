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
	
	// accounts
	function addAccount()
	{
		return view('new_account');
	}

	function viewAccounts()
	{
		return view('all_accounts');
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
