<?php

class User_model extends CI_Model
{


    public function get($id = null)
    {
        //$this->db->from('tb_user');
		//if ($id != null) {
          //  $this->db->where('id', $id);
       // }
		//$query = $this->db->get();
		$this->db->select('tb_user.*, level_user.nama_level');
		$this->db->from('tb_user');
		if ($id != null) {
    	$this->db->where('id', $id);
	}
		$this->db->join('level_user', 'level_user.id = tb_user.role_id');
		$query = $this->db->get();
		//var_dump($query); exit; 
        return $query;
	}

	public function get_user($data,$table){
		$this->db->insert($table,$data);
	}

	public function get_edit($where,$table)
	{
	return	$this->db->get_where($table,$where);
	}
	public function get_update($where,$data,$table)
	{
		$this->db->where($where);
	 	$this->db->update($table,$data);
	}
	public function get_hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
