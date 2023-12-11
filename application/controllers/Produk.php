<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Produk extends CI_Controller
{
	
	function __construct()
	{
		
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('Kategori_model');
        $this->load->model('Status_model');
        $this->load->model('Produk_model');
	}
	public function index()
	{
		$data['produk'] = $this->Produk_model->get_join()->result();
		$data['title'] 	= 'Produk';

		$this->load->view('theme/header', $data);
		$this->load->view('produk/list', $data);
		$this->load->view('theme/footer');
	}

	public function tambahproduk()
	{
		$data['title'] 		= 'Tambah Produk';
		$data['kategori'] 	= $this->db->get('kategori')->result(); 
		$data['status'] 	= $this->db->get('status')->result(); 
		// var_dump($data['kategori']);die();


		$this->form_validation->set_rules('nama_produk','Nama Produk','required|trim',[
			'required'=> 'Nama Produk Tidak Boleh Kosong!!!'
		]);
		$this->form_validation->set_rules('harga','Harga','required|integer|trim',[
			'required'=> 'Nominal Harga Tidak Boleh Kosong!!!',
			'integer' => 'Nominal Harga Harus Berupa Angka'
		]); 
		


		if ($this->form_validation->run() == false) {
			
			$this->load->view('theme/header', $data);
			$this->load->view('produk/tambah', $data);
			$this->load->view('theme/footer');
		}else{
			$data = [
				'nama_produk'		=>	$this->input->post('nama_produk'),
				'harga'				=>	$this->input->post('harga'),
				'kategori_id'		=>	$this->input->post('kategori'),
				'status_id'			=>	$this->input->post('status'),
			];

			$this->db->insert('produk', $data);
			if ($data['status_id']== 2) {
				$this->session->set_flashdata('message','Data Produk Baru Berhasil Ditambahkan Tetapi Tidak DItampilkan Karena Status Produk Tidak Bisa Dijual..');
			}else{

				$this->session->set_flashdata('message','Data Produk Baru Berhasil Ditambahkan..');
			}
			redirect('/');
		}
	}

    public function editproduk($id)
    {
    	$data['title'] 		= 'Edit Produk';
		$data['produk'] 	= $this->Produk_model->get_id($id)->row(); 
		$data['kategori'] 	= $this->db->get('kategori')->result(); 
		$data['status'] 	= $this->db->get('status')->result(); 
		// var_dump($data['produk']);die();


		$this->form_validation->set_rules('nama_produk','Nama Produk','required|trim',[
			'required'=> 'Nama Produk Tidak Boleh Kosong!!!'
		]);
		$this->form_validation->set_rules('harga','Harga','required|integer|trim',[
			'required'=> 'Nominal Harga Tidak Boleh Kosong!!!',
			'integer' => 'Nominal Harga Harus Berupa Angka'
		]); 
		


		if ($this->form_validation->run() == false) {
			
			$this->load->view('theme/header', $data);
			$this->load->view('produk/edit', $data);
			$this->load->view('theme/footer');
		}else{
			$data = [
				'nama_produk'		=>	$this->input->post('nama_produk'),
				'harga'				=>	$this->input->post('harga'),
				'kategori_id'		=>	$this->input->post('kategori'),
				'status_id'			=>	$this->input->post('status'),
			];

			$this->db->where('id_produk', $id);
			$this->db->update('produk', $data);
			if ($data['status_id']== 2) {
				$this->session->set_flashdata('message','Data Produk Baru Berhasil Diedit Tetapi Tidak DItampilkan Karena Status Produk Tidak Bisa Dijual..</div>');
			}else{

				$this->session->set_flashdata('message','Data Produk Baru Berhasil Diedit..</div>');
			}
			redirect('/');
		}

	}

    public function hapusproduk($id)
    {
    	$this->db->where('id_produk',$id);
    	$this->db->delete('produk');
    	
		$this->session->set_flashdata('message', 'Data Produk Berhasil Dihapus...');
		// redirect('/');
	}

	public function status()
	{
		
		$data['status'] = $this->db->get('status')->result(); 
		$data['title'] = 'Status'; 
		
		$this->form_validation->set_rules('nama_status','Nama Status','required|trim',[
			'required'=> 'Nama Status Tidak Boleh Kosong!!!'
		]);


		if ($this->form_validation->run() == false) {
			
			$this->load->view('theme/header', $data);
			$this->load->view('status/list', $data);
			$this->load->view('theme/footer');
		}else{
			$data = [
				'nama_status'		=>	$this->input->post('nama_status'),
			];

			$this->db->insert('status', $data);
			
			$this->session->set_flashdata('message','Data Status Baru Berhasil Ditambahkan..');
			redirect('/status');
		}
	}

	public function editstatus($id)
	{

		$data = ['nama_status'		=>	$this->input->post('nama_status')];

			$this->db->where('id_status', $id);
			$this->db->update('status', $data);
			
			$this->session->set_flashdata('message','Data Status Berhasil Diedit..');
			redirect('/status');
	}

	public function hapusstatus($id)
    {
    	$this->db->where('id_status',$id);
    	$this->db->delete('status');
    	
		$this->session->set_flashdata('message', 'Data Status Berhasil Dihapus...');
		// redirect('/');
	}

	public function kategori()
	{
		
		$data['kategori'] = $this->db->get('kategori')->result(); 
		$data['title'] = 'Kategori'; 
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','required|trim',[
			'required'=> 'Nama Kategori Tidak Boleh Kosong!!!'
		]);


		if ($this->form_validation->run() == false) {
			
			$this->load->view('theme/header', $data);
			$this->load->view('kategori/list', $data);
			$this->load->view('theme/footer');
		}else{
			$data = [
				'nama_kategori'		=>	$this->input->post('nama_kategori'),
			];

			$this->db->insert('kategori', $data);
			
			$this->session->set_flashdata('message','Data Kategori Baru Berhasil Ditambahkan..');
			redirect('/kategori');
		}
		
	}


	public function editkategori($id)
	{

		$data = ['nama_kategori'=>	$this->input->post('nama_kategori')];

			$this->db->where('id_kategori', $id);
			$this->db->update('kategori', $data);
			
			$this->session->set_flashdata('message','Data Kategori Berhasil Diedit..');
			redirect('/kategori');
	}

	public function hapuskategori($id)
    {
    	$this->db->where('id_kategori',$id);
    	$this->db->delete('kategori');
    	
		$this->session->set_flashdata('message', 'Data Kategori Berhasil Dihapus...');
		// redirect('/');
	}















	public function api()
	{
		$api_url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $username = 'tesprogrammer111223C23';
        $password = md5('bisacoding-11-12-23');

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'username' => $username,
            'password' => $password
        ));

        $api_data = curl_exec($ch);
        curl_close($ch);

        // Mengecek apakah data berhasil diambil
        if ($api_data === FALSE) {
            // Gagal mengambil data, mungkin ada masalah koneksi atau API tidak respons
            echo "Gagal mengambil data dari API.";
        } else {
            // Berhasil mengambil data, tampilkan atau proses data sesuai kebutuhan Anda
            echo $api_data;
        }
	}

	public function add_to_database()
	{

		$data_api = '{
			   "error":0,
			   "version":"220523.0.1",
			   "data":[
			      {
			         "no":"7",
			         "id_produk":"6",
			         "nama_produk":"ALCOHOL GEL POLISH CLEANSER GP-CLN01",
			         "kategori":"L QUEENLY",
			         "harga":"12500",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"10",
			         "id_produk":"9",
			         "nama_produk":"ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"1000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"12",
			         "id_produk":"11",
			         "nama_produk":"ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"1000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"13",
			         "id_produk":"12",
			         "nama_produk":"ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"12500",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"16",
			         "id_produk":"15",
			         "nama_produk":"ALUMUNIUM FOIL HDPE\/PE BULAT 23mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"12500",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"18",
			         "id_produk":"17",
			         "nama_produk":"ALUMUNIUM FOIL HDPE\/PE BULAT 30mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"1000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"19",
			         "id_produk":"18",
			         "nama_produk":"ALUMUNIUM FOIL HDPE\/PE SHEET 250mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"13000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"20",
			         "id_produk":"19",
			         "nama_produk":"ALUMUNIUM FOIL PET SHEET 250mm IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"1000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"23",
			         "id_produk":"22",
			         "nama_produk":"ARM PENDEK MODEL U",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"13000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"24",
			         "id_produk":"23",
			         "nama_produk":"ARM SUPPORT KECIL",
			         "kategori":"L MTH TABUNG (LK)",
			         "harga":"13000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"25",
			         "id_produk":"24",
			         "nama_produk":"ARM SUPPORT KOTAK PUTIH",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"13000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"27",
			         "id_produk":"26",
			         "nama_produk":"ARM SUPPORT PENDEK POLOS",
			         "kategori":"L MTH TABUNG (LK)",
			         "harga":"13000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"28",
			         "id_produk":"27",
			         "nama_produk":"ARM SUPPORT S IM",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"1000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"29",
			         "id_produk":"28",
			         "nama_produk":"ARM SUPPORT T (IMPORT)",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"13000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"30",
			         "id_produk":"29",
			         "nama_produk":"ARM SUPPORT T - MODEL 1 ( LOKAL )",
			         "kategori":"L MTH TABUNG (LK)",
			         "harga":"10000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"51",
			         "id_produk":"50",
			         "nama_produk":"BLACK LASER TONER FP-T3 (100gr)",
			         "kategori":"L MTH AKSESORIS (IM)",
			         "harga":"13000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"57",
			         "id_produk":"56",
			         "nama_produk":"BODY PRINTER CANON IP2770",
			         "kategori":"SP MTH SPAREPART (LK)",
			         "harga":"500",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"59",
			         "id_produk":"58",
			         "nama_produk":"BODY PRINTER T13X",
			         "kategori":"SP MTH SPAREPART (LK)",
			         "harga":"15000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"60",
			         "id_produk":"59",
			         "nama_produk":"BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800\/R800 - 4180 IM (T054920)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"10000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"61",
			         "id_produk":"60",
			         "nama_produk":"BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800\/R800\/R1900\/R2000 - 4120 IM (T054220)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"10000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"62",
			         "id_produk":"61",
			         "nama_produk":"BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800\/R800\/R1900\/R2000\/IX7000\/MG6170 - 4100 IM (T054020)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1500",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"63",
			         "id_produk":"62",
			         "nama_produk":"BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1500",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"64",
			         "id_produk":"63",
			         "nama_produk":"BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1500",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"65",
			         "id_produk":"64",
			         "nama_produk":"BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800\/R800\/R1900\/R2000 - 4140 IM (T054320)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"66",
			         "id_produk":"65",
			         "nama_produk":"BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800\/R800\/R1900\/R2000 - 3503 IM (T054820)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1500",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"67",
			         "id_produk":"66",
			         "nama_produk":"BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900\/R2000 IM - 4190 (T087920)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1500",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"68",
			         "id_produk":"67",
			         "nama_produk":"BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800\/R800\/R1900\/R2000 - 4170 IM (T054720)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1000",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"69",
			         "id_produk":"68",
			         "nama_produk":"BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800\/R800\/R1900\/R2000 - 4160 IM (T054420)",
			         "kategori":"CI MTH TINTA LAIN (IM)",
			         "harga":"1500",
			         "status":"tidak bisa dijual"
			      },
			      {
			         "no":"71",
			         "id_produk":"70",
			         "nama_produk":"BOTOL KOTAK 100ML LK",
			         "kategori":"L MTH AKSESORIS (LK)",
			         "harga":"1000",
			         "status":"bisa dijual"
			      },
			      {
			         "no":"73",
			         "id_produk":"72",
			         "nama_produk":"BOTOL 10ML IM",
			         "kategori":"S MTH STEMPEL (IM)",
			         "harga":"1000",
			         "status":"tidak bisa dijual"
			      }
			   ]
			}';
		$data_array = json_decode($data_api, true);

        foreach ($data_array['data'] as $item) {
            // Tambah Kategori
            $kategori_id = $this->Kategori_model->insert_kategori(['nama_kategori' => $item['kategori']]);

            // Tambah Status
            $status_id = $this->Status_model->insert_status(['nama_status' => $item['status']]);

            // Tambah Produk tanpa menyertakan id_produk
            $produk_data = array(
                'nama_produk' => $item['nama_produk'],
                'harga' => (double) $item['harga'],
                'kategori_id' => $kategori_id,
                'status_id' => $status_id
            );

            $this->Produk_model->insert_produk($produk_data);
        }

        echo "Data produk, kategori, dan status berhasil disimpan ke database.";
	}
}