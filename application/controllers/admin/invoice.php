<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller{

	public function __construct()
	{
		parent ::__construct();

		if($this->session->userdata('role_id')!= '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" 
			role="alert">
			Anda Belum Login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('auth/login');
		}
	}


	public function index()
	{
		$data['invoice']=$this->model_invoice->tampil_data();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/invoice',$data);
		$this->load->view('templates_admin/footer');
	}
	public function detail($id_invoice)
	{
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_invoice',$data);
		$this->load->view('templates_admin/footer');

	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tgl_pesan = $this->input->post('tgl_pesan');
		$batas_bayar =$this->input->post('batas_bayar');
		$status =$this->input->post('status');
	
		$data = array (
		'nama'	 		=> $nama ,
		'alamat'	 	=> $alamat,
		'tgl_pesan' 	=> $tgl_pesan,
		'batas_bayar' 	=> $batas_bayar,
		'status' 		=> $status

	);

	

	$this->model_invoice->get_data($data,'tb_invoice');
		redirect('admin/invoice/');
	
}


public function edit($id_invoice)
	{
		$where = array('id' => $id_invoice);
		$data['user'] = $this->model_invoice->get_edit($where,'tb_invoice')->result();

		

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_invoice', $data);
		$this->load->view('templates_admin/footer');	


	}

	public function update(){
		$id_invoice		= $this->input->post('id');
		$nama			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$tgl_pesan	 	= $this->input->post('tgl_pesan');
		$batas_bayar 	=$this->input->post('batas_bayar');
		$status 		=$this->input->post('status');

		$data = array(
		'nama'	 		=> $nama ,
		'alamat'	 	=> $alamat,
		'tgl_pesan' 	=> $tgl_pesan,
		'batas_bayar' 	=> $batas_bayar,
		'status' 		=> $status
		);
		$where = array(
			'id'=> $id_invoice
		);

		$this->session->set_flashdata('success', 'Data Berhasi Di Edit !!!');

		$this->model_invoice->get_update($where,$data,'tb_invoice');
		 redirect('admin/invoice');
	}


	public function hapus($id_invoice)
	{
		$where = array('id' => $id_invoice);
		$this ->model_invoice->hapus($where, 'tb_invoice');

		$this->session->set_flashdata('success', 'Data Berhasil Menghapus');


		redirect('admin/invoice');
	}
	public function cetak_laporan($id_invoice)
	{

		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$this->load->view('templates_admin/header');
		$this->load->view('admin/cetak_laporan',$data);
		$this->load->view('templates_admin/footer');

		
	}
}
