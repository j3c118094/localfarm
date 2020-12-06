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
		$session = $this->checkSession(0);

		if (!$session){
			return view('_panel/v_signin');
		} else {
			echo view('_panel/header.php');
			echo view('_panel/v_dash.php');
			echo view('_panel/footer.php');
			return 0;
		}
	}

	public function signUp(){

	}

	//--------------------------------------------------------------------

}
