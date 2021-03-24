<?php 

class Model_kontrakan extends CI_Model{
	public function tampil_data(){
	//return	$this->db->get('tb_kontrakan');
	$this->db->get('tb_kontrakan');
	$query =$this->db->get_where('tb_kontrakan', array('tb_kontrakan_status_id' => 10));
	return $query;
	}
	public function tampil_data_pemilik_kontrakan(){
		$user_id=$this->session->userdata('user_id');
		//die($user_id);
		// return	$this->db->get('tb_kontrakan');
		// $query = $this->db->get_where('tb_kontrakan', array('tb_user_id' => $user_id));
		$query = $this->db->query('
		select a.*, b.nama as nama_pemilik, c.status_kontrakan
		  from tb_kontrakan a , 
			   tb_user b ,
			   tb_kontrakan_status c
		 where a.tb_user_id = b.id 
		   and c.id = a.tb_kontrakan_status_id
		   and b.id='.$user_id.' order by b.id ');
		
		return $query;
		}

	public function tambah_kontrakan($data,$table){
		$this->db->insert($table,$data);
	}
	public function tambah_kontrakan_pemilik($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_kontrakan($where,$table)
	{
	return	$this->db->get_where($table,$where);
	}
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
		return true;
	}
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($id)
	{
		$result =$this->db->where('id_krn',$id)
						  ->limit(1)
						  ->get('tb_kontrakan');
		if ($result->num_rows() > 0){
			return$result->row();
		}else{
			return array();
		}
	}

	public function hitung()
	{
		$query =$this->db->query('SELECT * FROM tb_kontrakan');
		return $query->num_rows();
	}

	public function detail_krn($id_krn)
	{
		$result = $this->db->where('id_krn',$id_krn)->get('tb_kontrakan');
		if ($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function get_hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function tb_kontrakan_status(){
	return	$this->db->get('tb_kontrakan_status');
	}
	public function edit_kontrakan_status($where,$table)
	{
	return	$this->db->get_where($table,$where);
	}
	public function update_data_status($where,$data,$table)
	{
		$this->db->where($where);
	 	$this->db->update($table,$data);
	}
}
 