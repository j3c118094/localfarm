<?php namespace App\Controllers;

class Tentang extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_tentang.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
