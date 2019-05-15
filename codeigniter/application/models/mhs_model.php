<?php
class Mhs_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getAll()
	{
		$query = $this->db->get('mahasiswa');
		return $query->result();		
	}
	
	public function get($nrp)
	{	
		$this->db->where('nrp',$nrp);
		$query = $this->db->get('mahasiswa');
		return $query->row();		
	}
	
	public function simpan($data)
	{
		$this->db->insert('mahasiswa',$data);
	}

	public function ubah($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->where('nrp', $data['nrp']);
        $this->db->update('mahasiswa');
        if ($this->db->affected_rows() > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function hapus($nrp)
    {
        $this->db->where('nrp', $nrp);
        $this->db->delete('mahasiswa');
        if ($this->db->affected_rows() > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}