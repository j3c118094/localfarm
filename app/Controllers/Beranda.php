<?php namespace App\Controllers;

use App\Models\Visitor_Model;
use App\Models\Resep_Model;
use App\Models\Artikel_Model;

class Beranda extends BaseController
{

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->visitorModel = new Visitor_Model();
        $this->resepModel = new Resep_Model();
        $this->artikelModel = new Artikel_Model();

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



        // tadi gw coba tambahin if ($iplong == "2130706433" || $ip == "::1")
        // berhasil nyimpen di database, tapi ipnya kosong
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

        
        $iplong = ip2long($ip);
        $data['FULL'] = $iplong;

		$data['dataArtikel'] = $this->artikelModel->findAll();
        $data['dataResep'] = $this->resepModel->findAll();
        $data['judulPage'] = "Localfarm";
        echo view('_parts/header.php', $data);
		echo view('v_beranda.php', $data);
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
