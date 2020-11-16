<?php namespace App\Controllers;

class Beranda extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_beranda.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
