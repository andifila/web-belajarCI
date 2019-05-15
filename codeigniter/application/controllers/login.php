<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		$this->load->model('mhs_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index(){
		$Login = $this->session->has_userdata('sdhLogin');
		
		$data['message'] = $this->session->flashdata('message');
		
		if (!$Login){
			$this->load->library('form_validation');
		
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('login/index',$data);  
			} else {
				$nrpygdicari = $this->input->post('username');
				$password = $this->input->post('password');

				$row = $this->mhs_model->get($nrpygdicari);
				
				if (isset($row->nama) && $row->nama == $password){				
					$this->session->set_userdata('username',$row->nama);
					$this->session->set_userdata('hasLogin',TRUE);	
			
					redirect('mahasiswa');
				} else {
					$this->session->set_flashdata('message','Username atau password salah');
					$this->load->view('login/index',$data);
				}	  			  
			}			
		} else {
			redirect('mahasiswa');
		}			
	}
	
	public function logout(){
		$this->session->unset_userdata('sdhLogin');		
		redirect('login');
	}
	
	public function tanpa(){
		$this->session->set_userdata('username',"tanpa");
		$this->session->set_userdata('hasLogin',TRUE);	

		redirect('mahasiswa');
	}
	
}

