<?php namespace App\Controllers;

class Landing extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_landing.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
