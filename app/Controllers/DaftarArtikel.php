<?php namespace App\Controllers;

use App\Models\Artikel_Model;

class DaftarArtikel extends BaseController
{

	public function __construct() {
		$this->artikelModel = new Artikel_Model();
    }

	public function index()
	{

		$data['dataArtikel'] = $this->artikelModel->findAll();
        echo view('_parts/header.php');
		echo view('v_daftar_artikel.php', $data);
	    echo view('_parts/footer.php');
	}


	public function cari()
	{
		$q = $this->request->getGet('q');
		$db = \Config\Database::connect();

		$query = $db->query("SELECT * FROM artikel WHERE konten LIKE '%".$q."%'");
		$data['dataArtikel'] = $query->getResult();
		$data['cari'] = $q;

        echo view('_parts/header.php');
		echo view('v_daftar_artikel.php', $data);
	    echo view('_parts/footer.php');
	}
	//--------------------------------------------------------------------

}
