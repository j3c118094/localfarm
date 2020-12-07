<?php namespace App\Controllers;


use App\Models\Resep_Model;
use App\Models\Artikel_Model;

class Panel extends BaseController
{

	public function __construct() {
        $this->session = \Config\Services::session();

		$this->resepModel = new Resep_Model();
		$this->artikelModel = new Artikel_Model();
    }

	public function checkSession($status){
		if ($status){
			return 1;
		} else {
			return 0;
		}
	}

	public function index()
	{
		// DEBUG VARIABLE
		$session = $this->checkSession(1);

		if (!$session){
			return $this->signIn();
		} else {
			return $this->dash();
		}
	}

	public function signUp(){
		return view('_panel/v_signup.php');
	}

	public function signIn(){
		return view('_panel/v_signin.php');
	}

	public function dash(){
		return view('_panel/v_dash.php');
	}

	public function form(){
		return view('_panel/v_form.php');
	}

	public function post(){
		return view('_panel/v_post.php');
	}

	public function editor(){

        $id = $this->request->getPost('id');
		$data['dataResep'] = $this->resepModel->find($id);

		$data = [
            'id' => $this->request->getPost('id'),
            'tipe' => $this->request->getPost('tipe'),
    	];
		
		return view('_panel/v_editor.php', $data);
	}
	//--------------------------------------------------------------------

	public function save() {
        $data = [
            'id' => $this->request->getPost('id'),
            'judul' => $this->request->getPost('judul'),
            'thumb' => $this->request->getPost('thumb'),
            'konten' => $this->request->getPost('konten')
        ];

        $id = $this->request->getPost('id');
		$type = $this->request->getPost('type');
		if (empty($id)) { //Insert
			
			if ($type == 'resep'){
				$response = $this->resepModel->insert($data);
			} else {
				$response = $this->artikelModel->insert($data);
			}

            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
            }
        } else { // Update
			$where = ['id' => $id];
			
			if ($type == 'resep'){
				$response = $this->resepModel->update($where, $data);
			} else {
				$response = $this->artikelModel->update($where, $data);
			}
			
            
            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
            }
        }

        return redirect()->to(site_url('Panel/post'));
    }

}
