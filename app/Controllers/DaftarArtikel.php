<?php namespace App\Controllers;

class DaftarArtikel extends BaseController
{
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_daftar_artikel.php');
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
