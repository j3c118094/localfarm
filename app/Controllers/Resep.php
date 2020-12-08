<?php namespace App\Controllers;

use App\Models\Resep_Model; 

class Resep extends BaseController
{


	public function __construct() {
		$this->resepModel = new Resep_Model();
	}
	
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_DetailResep.php');
	    echo view('_parts/footer.php');
	}

		
	public function read($judul)
	{
		$data['dataResep'] = $this->resepModel->where('judul', $judul)
                   ->findAll();

		$data['url'] = $judul;
        echo view('_parts/header.php');
		echo view('v_DetailResep.php', $data);
	    echo view('_parts/footer.php');
	}
	//--------------------------------------------------------------------

}
