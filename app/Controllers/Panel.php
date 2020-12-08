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
			
            
            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
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
        
        if ($response) {
            $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil dihapus.']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal dihapus.']);
        }

        return redirect()->to(site_url('Panel/post'));
    }

}
