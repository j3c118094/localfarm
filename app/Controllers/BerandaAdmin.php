<?php namespace App\Controllers;

class BerandaAdmin extends BaseController
{
	public function index()
	{
        echo view('_partsAdmin/headerAdmin.php');
        echo view('_admin/v_login.php');
        echo view('_partsAdmin/footerAdmin.php');
	}

	//--------------------------------------------------------------------

}
