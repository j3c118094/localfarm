<?php namespace App\Controllers;

class Panel extends BaseController
{

	public function checkSession($status){
		if ($status){
			return 1;
		} else {
			return 0;
		}
	}

	public function index()
	{
		// DEBUG VARIABLE
		$session = $this->checkSession(1);

		if (!$session){
			return $this->signIn();
		} else {
			return $this->dash();
		}
	}

	public function signUp(){
		return view('_panel/v_signup.php');
	}

	public function signIn(){
		return view('_panel/v_signin.php');
	}

	public function dash(){
		return view('_panel/v_dash.php');
	}
	//--------------------------------------------------------------------

}
