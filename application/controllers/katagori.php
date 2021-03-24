<?php 

class Katagori extends CI_Controller{


	
	public function syariah()
	{
		$data['syariah']=$this->model_katagori->data_syariah()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('syariah',$data);
		$this->load->view('templates/footer');
		
	}
	public function biasa()
	{
		$data['biasa']=$this->model_katagori->data_biasa()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('biasa',$data);
		$this->load->view('templates/footer');
		
	}
	public function rumahan()
	{
		$data['rumahan']=$this->model_katagori->data_rumahan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('rumahan',$data);
		$this->load->view('templates/footer');
		
	}
	public function peralatan_rumah()
	{
		$data['peralatan_rumah']=$this->model_katagori->data_peralatan_rumah()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('peralatan_rumah',$data);
		$this->load->view('templates/footer');
		
	}
}
