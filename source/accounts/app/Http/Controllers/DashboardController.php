<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Account;

class DashboardController extends Controller
{
    //POST: ~/admin/change-password
    public function dashboard(Request $req)
    {
    	$data = [];
    	$all = User_Account::all()->count();
    	$act = User_Account::all()->where('_status', 1)->count();
    	$dct = User_Account::all()->where('_status', 0)->count();
    	$sus = User_Account::all()->where('_status', 9)->count();
    	$data['total_reg_users'] = $all;
    	$data['total_act_users'] = $act;
    	$data['total_dct_users'] = $dct;
    	$data['total_sus_users'] = $sus;

    	// data for line chart
    	$line = [];
    	$lineData = [];
    	$days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    	$day = 1;
    	$c_day = date('d');
    	if($days == 30)
    	{
			$labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"];
    	}
    	elseif($days == 28)
    	{
    		$labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"];
    	}
    	elseif($days == 29)
    	{
			$labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29"];
    	}
    	else
    	{
			$labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
    	}
    	$line['labels'] = $labels;
    	while($day <= $days)
    	{
    		$uInDay = rand(0, 30);
    		array_push($lineData, $uInDay);
    		if($day == $c_day){
    			break;
    		}
			$day++;
    	}
    	$line['data'] = $lineData;
    	$data['line'] = $line;

		// data for bar chart
		$bar = [];
    	$months = 12;
    	$month = 1;
    	$c_month = date('n');
    	while($month <= $months)
    	{
    		$uInMonth = rand(0, 1000);
    		array_push($bar, $uInMonth);
    		if($month == $c_month){
    			break;
    		}
			$month++;
    	}
    	$data['bar']['labels'] = ["Jan" , "Feb" , "Mar" , "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    	$data['bar']['data'] = $bar;

    	// data for doughnut chart
    	$data['doughnut']['labels'] = ['Active', 'Inactive', 'Suspended'];
    	$data['doughnut']['data'] = [ $act, $dct, $sus];
    	//return $data;
    	return view('dashboard', ['data' => $data]);
    }
}
