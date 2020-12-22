<?php namespace App\Controllers;

use App\Models\Artikel_Model;
use App\Models\Visitor_Model;

class DaftarArtikel extends BaseController
{

	public function __construct() {
		$this->artikelModel = new Artikel_Model();
		$this->visitorModel = new Visitor_Model();
        helper('cookie');
    }

	public function index()
	{

        $data['saved_ip'] = get_cookie('saved_ip');
        if ($data['saved_ip']){
            $ip = $data['saved_ip'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            set_cookie('saved_ip', $ip, time()+86400);
        }
         
        if ($ip == "::1"){
            $ip = "127.0.0.1";
        }
        
        $iplong = ip2long($ip);

        
        if ($iplong == "2130706433"){
            $visitorData = [
                'visitor_ip' => $iplong,
                'kota' => 'localhost',
                'visited_at' => date('d-m-Y_h:i:s'),
            ];
        } else {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            $city = $details->city; 
    
            $visitorData = [
                'visitor_ip' => $iplong,
                'kota' => $city,
                'visited_at' => date('d-m-Y_h:i:s'),
            ];
        }
        $dataExist = $this->visitorModel->find($iplong);
        if ($dataExist){
            $this->visitorModel->update($iplong, $visitorData);
        } else {
            $this->visitorModel->insert($visitorData);
        }

		$data['dataArtikel'] = $this->artikelModel->findAll();
        $data['cari'] = "";
        $data['judulPage'] = "Daftar Artikel";
        echo view('_parts/header.php', $data);
		echo view('v_daftar_artikel.php', $data);
	    echo view('_parts/footer.php');
	}


	public function cari()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
        $iplong = ip2long($_SERVER['REMOTE_ADDR']);
        
        if ($iplong == "2130706433"){
            $visitorData = [
                'visitor_ip' => $iplong,
                'kota' => 'localhost',
                'visited_at' => date('d-m-Y_h:i:s'),
            ];
        } else {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            $city = $details->city; 
    
            $visitorData = [
                'visitor_ip' => $iplong,
                'kota' => $city,
                'visited_at' => date('d-m-Y_h:i:s'),
            ];
        }
        $dataExist = $this->visitorModel->find($iplong);
        if ($dataExist){
            $this->visitorModel->update($iplong, $visitorData);
        } else {
            $this->visitorModel->insert($visitorData);
        }

		
		$q = $this->request->getGet('q');
		$db = \Config\Database::connect();

		$query = $db->query("SELECT * FROM artikel WHERE konten LIKE '%".$q."%' OR judul LIKE '%".$q."%'");
		$data['dataArtikel'] = $query->getResult();
		$data['cari'] = $q;

        $data['judulPage'] = "Cari Artikel : ".$q;
        echo view('_parts/header.php', $data);
		echo view('v_daftar_artikel.php', $data);
	    echo view('_parts/footer.php');
	}
	//--------------------------------------------------------------------

}
