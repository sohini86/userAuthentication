<?php 
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use App;
use App\User;
use Cookie;

class LoginController extends Controller {

	/***************Login a user***********************/
	public function doLogin(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
			
        ]);

        if ($validator->fails()) {
			$request->session()->flash('alert-warning', 'Please enter mandatory fields.');
            return redirect('/')
                        ->withErrors($validator);
		}
		else
		{
			 $userdata = array(
            'email'     => $request->input('email'),
           'password'  => $request->input('password')
          );
       $remember = ($request->input('remember')) ? true : false;
	 
	    $auth = \Auth::attempt(
            [
               'email'     => $request->input('email'),
			   'password'  => $request->input('password')
            ]
        );
    // attempt to do the login
    if ($auth) {
	  //For remember me option
	  if($remember==1)
	  {
	  Cookie::queue('remember', '1', 5400);
	  Cookie::queue('user', $request->input('email'), 5400);
	  Cookie::queue('pass', $request->input('password'), 5400);
	  }
	  else
	  {
	  Cookie::queue('remember', '', 5400);
	  Cookie::queue('user', '', 5400);
	  Cookie::queue('pass', '', 5400);
	  }
       
      return redirect('/dashboard');
    } else {        

        return redirect('/');

    }

		}
	}
	/**************For register page*************************/
	public function register()
	{
		return view('register');
	}
	/***************Registration Form Submit************/
	public function registerSubmit(Request $request)
	{
		$rules = array(
			'name'      => 'required',
			'email'      => 'required',
			'password'      => 'required'
			);
	
		$validator = Validator::make($request->all(), $rules);
			
		if ($validator->fails()) {
			$request->session()->flash('alert-warning', '');
			return redirect('register/')->withErrors($validator)->withInput();
		}
	
		
		App\User::userSave($request->all());	
		$request->session()->flash('alert-success', 'User added successfully');
		return redirect('/register');
	}
	/*************Google Login Page***********************/
	public function googleLogin()
	{
		return view('googleLogin');
		
	}
	/*************Facebook Login Page***********************/
	public function facebookLogin()
	{
		return view('facebookLogin');
		
	}


}
