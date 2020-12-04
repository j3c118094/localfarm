<?php namespace App\Controllers;

class Kuesioner extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_kuesioner.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
