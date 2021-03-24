<?php 

class Model_katagori extends CI_Model{
	public function data_syariah(){
		return $this->db->get_where('tb_kontrakan',array(
			'katagori'=> 'syariah'));
	}
	public function data_biasa(){
		return $this->db->get_where('tb_kontrakan',array(
			'katagori'=> 'biasa'));
	}
	public function data_rumahan(){
		return $this->db->get_where('tb_kontrakan',array(
			'katagori'=> 'rumahan'));
	}
	public function data_peralatan_rumah(){
		return $this->db->get_where('tb_kontrakan',array(
			'katagori'=> 'peralatan rumah'));
	}
	}
