<?php namespace App\Controllers;


use App\Models\Response_Model;
use App\Models\Visitor_Model;

class Kuesioner extends BaseController
{

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->visitorModel = new Visitor_Model();
        $this->responseModel = new Response_Model();
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

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM response WHERE visitor_ip = '".$iplong."'");
		$hasFilled = $query->getResult();
        if ($hasFilled){
            $data = [
                'hasFilled' => true,
            ];
        } else {
            $data = [
                'hasFilled' => false,
            ];
        }


        $data['judulPage'] = "Kuesioner";
        echo view('_parts/header.php', $data);
		echo view('v_kuesioner.php', $data);
	    echo view('_parts/footer.php');
	}

	public function response() {
        $q1 = $this->request->getPost('no_1');
        $q2 = $this->request->getPost('no_2');
        $q3 = $this->request->getPost('no_3');
        $q4 = $this->request->getPost('no_4');
        $q5 = $this->request->getPost('no_5');
                
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
        
        $dataresponse = $q1.'|'.$q2.'|'.$q3.'|'.$q4.'|'.$q5;

        // var_dump($iplong);die;

        $data = [
            'responseid' => "",
            'responses' => $dataresponse,
            'submitted_at' => date('d-m-Y_h:i:s'),
            'visitor_ip' => $iplong,
        ];

        $response = $this->responseModel->insert($data);
        
        return redirect()->to(site_url('Kuesioner'));
    }
	//--------------------------------------------------------------------

}
