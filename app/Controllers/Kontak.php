<?php namespace App\Controllers;

class Kontak extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_kontak.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
