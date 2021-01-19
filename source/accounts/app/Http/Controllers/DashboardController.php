<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Account;
use DB;

class DashboardController extends Controller
{
    //GET: ~/
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
    	while($day <= $days)
    	{
            $uInDay = DB::table('user_accounts')->whereRaw('DAY(_reg_at) = '.$day)->count();
    		array_push($lineData, $uInDay);
    		if($day == $c_day){
    			break;
    		}
			$day++;
    	}
        $data['line']['labels'] = $labels;
    	$data['line']['datasets'] = [['label' => 'User Registered', 'data' => $lineData, 'borderColor' => '#3e95cd']];

		// data for bar chart
		$barData = [];
        $barColor = [];
    	$months = 12;
    	$month = 1;
    	$c_month = date('n');
    	while($month <= $months)
    	{
            $uInMonth = DB::table('user_accounts')->whereRaw('MONTH(_reg_at) = '.$month)->count();
    		array_push($barData, $uInMonth);
            array_push($barColor, '#3ecd42');
    		if($month == $c_month){
    			break;
    		}
			$month++;
    	}
    	$data['bar']['labels'] = ["Jan" , "Feb" , "Mar" , "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    	$data['bar']['datasets'] = [['backgroundColor' => $barColor, 'label' => "User Registered", 'data' => $barData]];

    	// data for doughnut chart
        $data['doughnut']['labels'] =  ['Active', 'Inactive', 'Suspended'];
        $data['doughnut']['datasets'] = [['backgroundColor' => ["#5ee25e", "#ff4a4a", "#a9a6a6"], 'data'=> [ $act, $dct, $sus]]];
    	//return $data;
    	return view('dashboard', ['data' => $data]);
    }
}
