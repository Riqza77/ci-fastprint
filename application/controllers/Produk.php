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
	}

}