<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAll(){
		$data = $this->db->get('dosen');
		return $data->result();	
	}
	
	public function get($nip = FALSE){
		if ($nip === FALSE)
	   {
		  $query = $this->db->get('dosen');
		  return $query->result();
	   }

	   $this->db->where('nip',$nip);
	   $query = $this->db->get('dosen');
	   return $query->row();
	}
	
	public function koreksi($data, $key){
		$this->db->where('nip',$key);
		$this->db->update('dosen',$data);
	}

	
}
