<?php namespace App\Controllers;

use App\Models\Artikel_Model; 
use App\Models\Visitor_Model; 

class Artikel extends BaseController
{


	public function __construct() {
		$this->artikelModel = new Artikel_Model();
		$this->visitorModel = new Visitor_Model();
	}
	
	public function index()
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
