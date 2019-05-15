<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		
		$login = $_SESSION['hasLogin'];
		if($login == FALSE){
			redirect('login');
		}
	}
	public function ajax(){
		$kota = $this->input->post('city');
		echo "Sugeng $kota";
	}
	public function index()
	{	
		$this->load->model('dosen_model');
		//$temp['n'] = $_SESSION["namanya"];
		$temp['d'] = $this->dosen_model->getAll();
		$this->load->view('dosen/tabel_dosen',$temp);
	}
	public function show($arg1 = FALSE){
		$this->load->model('dosen_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nip', 'NIP deh', 'trim|required|min_length[5]',
		array('required' => 'Loe harus ngisi %s.'));
		if ($this->form_validation->run() == FALSE)
		{	
			$temp['m'] = $this->dosen_model->get($arg1);
			$this->load->view('dosen/detil',$temp);
		}
		else
		{
			$data = $this->input->post(array('nip','nama'));
			$data['foto'] = $this->do_upload();
			$kunci = $this->input->post('old_key');
			$this->dosen_model->koreksi($data, $kunci);
			$this->load->view('dosen/formsuccess');
		}
	  
	  
	}
	
	public function do_upload()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			 return $this->upload->data()['file_name'];
		}
	}

}
