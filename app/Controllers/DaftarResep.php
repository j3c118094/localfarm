<?php namespace App\Controllers;

use App\Models\Resep_Model; 

class DaftarResep extends BaseController
{

	public function __construct() {
		$this->resepModel = new Resep_Model();
    }

	public function index()
	{
		$data['dataResep'] = $this->resepModel->findAll();
        echo view('_parts/header.php');
		echo view('v_resep.php', $data);
	    echo view('_parts/footer.php');
	}

	public function cari()
	{
		$q = $this->request->getGet('q');
		$db = \Config\Database::connect();

		$query = $db->query("SELECT * FROM resep WHERE konten LIKE '%".$q."%' OR judul LIKE '%".$q."%'");
		$data['dataResep'] = $query->getResult();
		$data['cari'] = $q;

        echo view('_parts/header.php');
		echo view('v_resep.php', $data);
	    echo view('_parts/footer.php');
	}


	//--------------------------------------------------------------------

}