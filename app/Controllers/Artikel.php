<?php namespace App\Controllers;

class Artikel extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_artikel.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
