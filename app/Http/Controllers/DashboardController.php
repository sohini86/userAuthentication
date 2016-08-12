<?php 
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use App;
use Cookie;

class DashboardController extends Controller {


    /**************** Get Dashboard List *************************************/
	public function getDashboard()
	{
		
		$userid=\Auth::user()->id;
		
		$userList = App\User::find($userid);

		return view('dashboardListing')->with('user_data', $userList);;
		
	}
	

	
}
