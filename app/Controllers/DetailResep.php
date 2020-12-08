<?php namespace App\Controllers;

class DetailResep extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_DetailResep.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
