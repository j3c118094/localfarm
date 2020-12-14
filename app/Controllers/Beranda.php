<?php namespace App\Controllers;

use App\Models\Visitor_Model;

class Beranda extends BaseController
{

    public function __construct() {
        $this->session = \Config\Services::session();

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

		
        echo view('_parts/header.php');
		echo view('v_beranda.php', $data);
	    echo view('_parts/footer.php');
	}

	//--------------------------------------------------------------------

}
