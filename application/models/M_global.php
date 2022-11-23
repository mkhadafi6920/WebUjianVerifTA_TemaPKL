<?php 

class M_global extends CI_Model
{


    public function tampildata($tabel)
	{
        $query = $this->db->get($tabel);

		return $query->result();
	}
   
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

    function tampiledit($where,$table){		
		return $this->db->get_where($table,$where);
	}


    function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	


}

