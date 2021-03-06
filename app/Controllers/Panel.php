<?php namespace App\Controllers;


require ROOTPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
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


		$data['dataResep'] = $this->resepModel->findAll();
		$data['dataArtikel'] = $this->artikelModel->findAll();
		$data['dataResponse'] = $this->responseModel->findAll();
		$data["judulPage"] = $this->request->uri->getSegment(2);
		return view('_panel/v_dash.php', $data);
	}

	public function signUp(){
		$data['is_admin'] = $this->checkSession();
		$data['status']= "a";

		$data["judulPage"] = $this->request->uri->getSegment(2);
		return view('_panel/v_signup.php', $data);
	}


	public function register(){

		$data['is_admin'] = $this->checkSession();
		$data['status']= "a";

        $data = [
            'username' => $this->request->getPost('user'),
            'password' => md5($this->request->getPost('pass')),
			'nama' => $this->request->getPost('nama'),
            'root' => $this->request->getPost('root'),
		];
		
		if ($data['root'] == "localfarmadmin") {
			$exists = $this->adminModel->find($data['username']);
		} else {
			$exists = "invalid";
		}

		if (empty($exists)) { //Insert
			
			$response = $this->adminModel->insert($data);
			$data['status'] = "berhasil";

        } else { // Update
			$data['status'] = "gagal";
		}
		
		$data['is_admin'] = $this->checkSession();

		$data["judulPage"] = $this->request->uri->getSegment(2);
		return view('_panel/v_signup.php', $data);
	}



	public function signIn(){

		$data['is_admin'] = $this->checkSession();
		$data['status'] = 0;

		$data["judulPage"] = $this->request->uri->getSegment(2);
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

		$data["judulPage"] = $this->request->uri->getSegment(2);
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
		return $this->index();
	}

 
	public function form(){
		$db = \Config\Database::connect();

		$data['is_admin'] = $this->checkSession();
		$data['nama'] = $this->session->get('nama');
		$query = $db->query("SELECT visitor.kota FROM response INNER JOIN visitor ON response.visitor_ip=visitor.visitor_ip");
		$data['dataJoin'] = $query->getResult();


		$data['dataResponse'] = $this->responseModel->findAll();
		if ($data['dataResponse']){
			$ip = $data['dataResponse'][0]->visitor_ip;
			$data['dataVisitor'] = $this->visitorModel->find($ip);
			$data['kota'] = $data['dataVisitor']->kota;
            
            //Pie Pertanyaan 1
            $data['dataPieQ11'] = 0;
            $data['dataPieQ12'] = 0;
            $data['dataPieQ13'] = 0;

            //Array Pertanyaan 2
            $data['dataArr1'] = "";
            
            //Pie Pertanyaan 3
            $data['dataPieQ21'] = 0;
            $data['dataPieQ22'] = 0;
            $data['dataPieQ23'] = 0;
            $data['dataPieQ24'] = 0;

            //Pie Pertanyaan 4
            $data['dataPieQ31'] = 0;
            $data['dataPieQ32'] = 0;
            $data['dataPieQ33'] = 0;


            //Array Pertanyaan 5
            $data['dataArr2'] = "";

            foreach ($data['dataResponse'] as $responden){
                $answer = explode("|", $responden->responses);

                $data['dataArr1'] .= $answer[1]."|";
                $data['dataArr2'] .= $answer[4]."|";

                if ($answer[0] == "Sangat Tahu"){
                    $data['dataPieQ11'] += 1;
                } elseif ($answer[0] == "Cukup Tahu") {
                    $data['dataPieQ12'] += 1;
                } elseif ($answer[0] == "Tidak Tahu") {
                    $data['dataPieQ13'] += 1;
                }

                if ($answer[2] == "Sangat Sering"){
                    $data['dataPieQ21'] += 1;
                } elseif ($answer[2] == "Sedang") {
                    $data['dataPieQ22'] += 1;
                } elseif ($answer[2] == "Pernah") {
                    $data['dataPieQ23'] += 1;
                } elseif ($answer[2] == "Tidak Pernah") {
                    $data['dataPieQ24'] += 1;
                }

                if ($answer[3] == "Sangat Membantu"){
                    $data['dataPieQ31'] += 1;
                } elseif ($answer[3] == "Cukup Membantu") {
                    $data['dataPieQ32'] += 1;
                } elseif ($answer[3] == "Tidak Membantu") {
                    $data['dataPieQ33'] += 1;
                }

                
            }
		} else {

		}

		$data["judulPage"] = $this->request->uri->getSegment(2);
		return view('_panel/v_form.php', $data);
	}

	public function post(){


		$data['is_admin'] = $this->checkSession();
		$data['nama'] = $this->session->get('nama');
		$data['dataResep'] = $this->resepModel->findAll();
		$data['dataArtikel'] = $this->artikelModel->findAll();


		$data["judulPage"] = $this->request->uri->getSegment(2);
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

		$data["judulPage"] = $this->request->uri->getSegment(2);
		return view('_panel/v_editor.php', $data);
	}
	//--------------------------------------------------------------------

	public function save() {

        $id = $this->request->getPost('id');
		$type = $this->request->getPost('tipe');
        
		

        if (empty($id)) { //Insert
            $newName = "default.jpg";
        } else { // Update
			$where = ['id' => $id];
			
			if ($type == 'resep'){
                $existing = $this->resepModel->find($id);
				$newName = $existing->thumbnail;
			} else {
                $existing = $this->artikelModel->find($id);
				$newName = $existing->thumbnail;
			}
        }

		if($imagefile = $this->request->getFiles())
		{
			if($img = $imagefile['thumb'])
			{
				if ($img->isValid() && ! $img->hasMoved())
				{
					$filename= $_FILES["thumb"]["name"];
					$ext = pathinfo($filename,PATHINFO_EXTENSION);
					
					$newName = $type."-".date('Y-m-d')."_".md5(str_replace(" ", "-", strtolower($this->request->getPost('judul')))).".".$ext; //This is if you want to change the file name to encrypted name
					$img->move(ROOTPATH.'../assets/uploads/', $newName);

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
	
	public function exportxls(){
		$valid = $this->request->getPost('valid');

		if (!($valid)){
			return $this->index();
		}

		$data['nama'] = $this->session->get('nama');
		
		$spreadsheet = new Spreadsheet();

		// Set Properties
		$spreadsheet->getProperties()
		->setCreator($data['nama'].' - LOCALFARM')
		->setLastModifiedBy($data['nama'])
		->setTitle('LOCALFARM - REPORT')
		->setSubject('REPORT')
		->setDescription('REPORT LOCALFARM TABEL '.date('d-m-Y'))
		->setKeywords('LOCALFARM REPORT')
		->setCategory('LOCALFARM - REPORT');

		// Data Sheet 1
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'REPORT RESPONSE KUESIONER')
		->mergeCells('A1:F1')
		->setCellValue('A2', 'NO')
		->setCellValue('B2', 'Response ID')
		->setCellValue('C2', 'Identifier Pengisi')
		->setCellValue('D2', 'Domisili Pengisi')
		->setCellValue('E2', 'Isi Response')
		->setCellValue('F2', 'Tanggal Response')
		;

		$styleArray = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
				'rotation' => 90,
				'startColor' => [
					'argb' => 'FF88FF88',
				],
				'endColor' => [
					'argb' => 'FF88FF88',
				],
			],
		];

		$spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);


		$responses = $this->responseModel->findAll();
		$cellIndex = 3;
		$no = 1;
		foreach ($responses as $response) {
			$ip = $response->visitor_ip;
			$visitor = $this->visitorModel->find($ip);
			$kota = $visitor->kota;

			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$cellIndex, $no)
			->setCellValue('B'.$cellIndex, $response->responseid)
			->setCellValue('C'.$cellIndex, $response->visitor_ip)
			->setCellValue('D'.$cellIndex, $kota)
			->setCellValue('E'.$cellIndex, $response->responses)
			->setCellValue('F'.$cellIndex, $response->submitted_at);

			$cellIndex++;
			$no++;
		};

		$spreadsheet->getActiveSheet()->setTitle('Report Response - '.date('d-m-Y H'));


		// ====================================================================================

		// Data Sheet 2
		$spreadsheet->createSheet();
		$spreadsheet->setActiveSheetIndex(1)
		->setCellValue('A1', 'REPORT ARTIKEL')
		->mergeCells('A1:F1')
		->setCellValue('A2', 'NO')
		->setCellValue('B2', 'Artikel ID')
		->setCellValue('C2', 'Judul')
		->setCellValue('D2', 'Konten (HTML)')
		->setCellValue('E2', 'Author')
		->setCellValue('F2', 'Tanggal Dibuat')
		;

		$styleArray = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
				'rotation' => 90,
				'startColor' => [
					'argb' => 'FF88FF88',
				],
				'endColor' => [
					'argb' => 'FF88FF88',
				],
			],
		];

		$spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);


		$artikels = $this->artikelModel->findAll();
		$cellIndex = 3;
		$no = 1;
		foreach ($artikels as $artikel) {

			$spreadsheet->setActiveSheetIndex(1)
			->setCellValue('A'.$cellIndex, $no)
			->setCellValue('B'.$cellIndex, $artikel->id)
			->setCellValue('C'.$cellIndex, $artikel->judul)
			->setCellValue('D'.$cellIndex, $artikel->konten)
			->setCellValue('E'.$cellIndex, $artikel->author)
			->setCellValue('F'.$cellIndex, $artikel->created_at);

			$cellIndex++;
			$no++;
		};

		$spreadsheet->getActiveSheet()->setTitle('Report Artikel - '.date('d-m-Y H'));



		// ====================================================================================

		// Data Sheet 3
		$spreadsheet->createSheet();
		$spreadsheet->setActiveSheetIndex(2)
		->setCellValue('A1', 'REPORT RESEP')
		->mergeCells('A1:F1')
		->setCellValue('A2', 'NO')
		->setCellValue('B2', 'Resep ID')
		->setCellValue('C2', 'Judul')
		->setCellValue('D2', 'Konten (HTML)')
		->setCellValue('E2', 'Author')
		->setCellValue('F2', 'Tanggal Dibuat')
		;

		$styleArray = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
				'rotation' => 90,
				'startColor' => [
					'argb' => 'FF88FF88',
				],
				'endColor' => [
					'argb' => 'FF88FF88',
				],
			],
		];

		$spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);


		$reseps = $this->resepModel->findAll();
		$cellIndex = 3;
		$no = 1;
		foreach ($reseps as $resep) {

			$spreadsheet->setActiveSheetIndex(2)
			->setCellValue('A'.$cellIndex, $no)
			->setCellValue('B'.$cellIndex, $resep->id)
			->setCellValue('C'.$cellIndex, $resep->judul)
			->setCellValue('D'.$cellIndex, $resep->konten)
			->setCellValue('E'.$cellIndex, $resep->author)
			->setCellValue('F'.$cellIndex, $resep->created_at);

			$cellIndex++;
			$no++;
		};

		$spreadsheet->getActiveSheet()->setTitle('Report Resep - '.date('d-m-Y H'));


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Report Localfarm.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
	
		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0
	
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;

	}
	
}
