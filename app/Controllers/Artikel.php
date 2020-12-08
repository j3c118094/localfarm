<?php namespace App\Controllers;

use App\Models\Artikel_Model;

class Artikel extends BaseController
{


	public function __construct() {
		$this->artikelModel = new Artikel_Model();
	}
	
	public function index()
	{
        echo view('_parts/header.php');
		echo view('v_artikel.php');
	    echo view('_parts/footer.php');
	}

		
	public function read($judul)
	{
		$data['dataArtikel'] = $this->artikelModel->where('judul', $judul)
                   ->findAll();

		$data['url'] = $judul;
        echo view('_parts/header.php');
		echo view('v_artikel.php', $data);
	    echo view('_parts/footer.php');
	}
	//--------------------------------------------------------------------

}
