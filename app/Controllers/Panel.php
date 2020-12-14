<?php namespace App\Controllers;


use App\Models\Resep_Model;
use App\Models\Artikel_Model;
use App\Models\Response_Model;
use App\Models\Visitor_Model;
use App\Models\Admin_Model;

class Panel extends BaseController
{

	public function __construct() {
        $this->session = \Config\Services::session();

		$this->resepModel = new Resep_Model();
		$this->responseModel = new Response_Model();
		$this->visitorModel = new Visitor_Model();
		$this->artikelModel = new Artikel_Model();
		$this->adminModel = new Admin_Model();
    }

	public function checkSession(){
		$status = $this->session->get('is_admin');
		if ($status){
			return 1;
		} else {
			return 0;
		}
	}

	public function index()
	{
/* 		// DEBUG VARIABLE
		$session = $this->checkSession();

		if (!$session){
			return $this->signIn();
		} else {
			return $this->dash();
		} */

		return $this->dash();

	}

	public function dash(){
		$data['is_admin'] = $this->checkSession();
		$data['nama'] = $this->session->get('nama');
		
		return view('_panel/v_dash.php', $data);
	}

	public function signUp(){
		$data['is_admin'] = $this->checkSession();
		$data['status']= "a";
		return view('_panel/v_signup.php', $data);
	}


	public function register(){

		$data['is_admin'] = $this->checkSession();
		$data['status']= "a";

        $data = [
            'username' => $this->request->getPost('user'),
            'password' => md5($this->request->getPost('pass')),
            'nama' => $this->request->getPost('nama'),
		];
		
		$exists = $this->adminModel->find($data['username']);

		if (empty($exists)) { //Insert
			
			$response = $this->adminModel->insert($data);
			$data['status'] = "berhasil";

        } else { // Update
			$data['status'] = "gagal";
		}
		
		return view('_panel/v_signup.php', $data);
	}



	public function signIn(){

		$data['is_admin'] = $this->checkSession();
		$data['status'] = 0;
		return view('_panel/v_signin.php', $data);
	}

	public function rootaccess(){

		$key = "localfarmadmin";
		return $key;
	}

	public function account(){

		$data['is_admin'] = $this->checkSession();
		$data['status'] = 0;
		$username = $this->request->getPost('user');
		$password = $this->request->getPost('pass');
		$data['akun'] = $this->adminModel->find($username);
		if ($data['akun']){
			if (md5($password) == $data['akun']->password){
				$newdata = [
					'username'  => $data['akun']->username,
					'nama'     => $data['akun']->nama,
					'is_logged' => TRUE,
					'is_admin' => TRUE
				];
			
				$this->session->set($newdata);
				/* $data['session'] = $session; */
				$data['status'] = "Terverifikasi";
				return view('_panel/redirect.php', $data);
			} else {
				$data['status'] = 2;
				return view('_panel/v_signin.php', $data);
			}
		} else {
			$data['status'] = 1;
			return view('_panel/v_signin.php', $data);
		}

	}

	public function signOut(){
		$current = ['username', 'nama', 'is_logged', 'is_admin'];
		$this->session->remove($current);
		sleep(.5);
		return $this->index();
	}

 
	public function form(){
		$db = \Config\Database::connect();

		$data['is_admin'] = $this->checkSession();
		$data['nama'] = $this->session->get('nama');
		$query = $db->query("SELECT visitor.kota FROM response INNER JOIN visitor ON response.visitor_ip=visitor.visitor_ip");
		$data['dataJoin'] = $query->getResult();


		$data['dataResponse'] = $this->responseModel->findAll();
		IF ($data['dataResponse']){
			$ip = $data['dataResponse'][0]->visitor_ip;
			$data['dataVisitor'] = $this->visitorModel->find($ip);
			$data['kota'] = $data['dataVisitor']->kota;
		} else {

		}
		return view('_panel/v_form.php', $data);
	}

	public function post(){


		$data['is_admin'] = $this->checkSession();
		$data['nama'] = $this->session->get('nama');
		$data['dataResep'] = $this->resepModel->findAll();
		$data['dataArtikel'] = $this->artikelModel->findAll();


		return view('_panel/v_post.php', $data);
	}

	public function editor(){

		$id = $this->request->getPost('id');
		$type = $this->request->getPost('tipe');

		if ($type == 'resep'){
			$data = [
				'id' => $this->request->getPost('id'),
				'tipe' => $this->request->getPost('tipe'),
				'data' => $this->resepModel->find($id),
			];
		} else {
			$data = [
				'id' => $this->request->getPost('id'),
				'tipe' => $this->request->getPost('tipe'),
				'data' => $this->artikelModel->find($id),
			];
		}
		

		
		$data['is_admin'] = $this->checkSession();
		$data['nama'] = $this->session->get('nama');
		$data['author'] = $this->checkSession();
		return view('_panel/v_editor.php', $data);
	}
	//--------------------------------------------------------------------

	public function save() {

        $id = $this->request->getPost('id');
		$type = $this->request->getPost('tipe');
		$newName = "default.jpg";
		if($imagefile = $this->request->getFiles())
		{
			if($img = $imagefile['thumb'])
			{
				if ($img->isValid() && ! $img->hasMoved())
				{
					$filename= $_FILES["thumb"]["name"];
					$ext = pathinfo($filename,PATHINFO_EXTENSION);
					
					$newName = $type."-".date('Y-m-d').".".$ext; //This is if you want to change the file name to encrypted name
					$img->move(ROOTPATH.'public/assets/uploads/', $newName);

					// You can continue here to write a code to save the name to database
					// db_connect() or model format
			

				}
			}
		}

        $data = [
            'id' => $this->request->getPost('id'),
            'judul' => str_replace(" ", "-", strtolower($this->request->getPost('judul'))),
			'thumbnail' => $newName,
			'author' => $this->session->get('nama'),
			'konten' => $this->request->getPost('konten'),
			'created_at' => date('Y-m-d'),
        ];

		if (empty($id)) { //Insert
			
			if ($type == 'resep'){
				$response = $this->resepModel->insert($data);
			} else {
				$response = $this->artikelModel->insert($data);
			}
        } else { // Update
			$where = ['id' => $id];
			
			if ($type == 'resep'){
				$response = $this->resepModel->update($where, $data);
			} else {
				$response = $this->artikelModel->update($where, $data);
			}
			
        
        }

        return redirect()->to(site_url('Panel/post'));
	}
	
	public function delete() {
		$id = $this->request->getPost('id');
		$type = $this->request->getPost('tipe');

		if ($type == 'resep'){
			$response = $this->resepModel->delete($id);
		} else {
			$response = $this->artikelModel->delete($id);
		}
        


        return redirect()->to(site_url('Panel/post'));
    }

}
