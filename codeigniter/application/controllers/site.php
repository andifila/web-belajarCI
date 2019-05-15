<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct(){	
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url','form'));
		$this->load->model('mhs_model');
		$this->msg = $this->session->flashdata('message');
		
		$this->username = $this->session->userdata('username');		
		
		if (empty($this->username)){
			$this->session->set_flashdata('message','Login dulu');
			redirect('login');			
		} 
	}
	public function index()
	{		
		$this->load->view('hallo');
	}
	
	public function show()
	{		
		$data['message'] = $this->msg;
		$data['username'] = $this->username;
		$data['records'] = $this->mhs_model->getAll();		
		$this->load->view('mhs/list',$data);
	}
	
	public function tambah()
	{
		$this->load->view('mhs/tambah');		
		
	}
	public function simpan()
	{
		$data['nrp1'] = $this->input->post('nrp');
		$data['nama'] = $this->input->post('nama');
		$this->mhs_model->simpan($data);
		redirect('site/show');
	}
	
	public function koreksi($nrpygdicari){
		$row = $this->mhs_model->get($nrpygdicari);
		$data['nrp'] = $row->nrp;
		$data['nama'] = $row->nama;
		$this->load->view('mhs/form_edit',$data);
	}
}