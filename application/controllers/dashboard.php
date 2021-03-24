<?php 

class Dashboard extends CI_Controller{

	

	

	//public function __construct()
//	{
	//	parent ::__construct();

	//	if($this->session->userdata('role_id')!= '2'){
	//		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" 
	//		role="alert">
	//		Anda Belum Login!
	//		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	//		  <span aria-hidden="true">&times;</span>
	//		</button>
	//	  </div>');
	//	  redirect('auth/login');
	//	}
//	}


	
	public function tambah_pemesanan($id)
	{
		
		$kontrakan = $this->model_kontrakan->find($id);

		$data = array(
			'id'      => $kontrakan->id_krn,
			'qty'     => 1,
			'price'   => $kontrakan->harga, 
			'name'    => $kontrakan->nama_krn

	);
	
	$this->cart->insert($data);
	redirect('welcome');

	$this->form_validation->set_rules('stok');
	}
	public function detail_pemesanan()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pemesanan');
		$this->load->view('templates/footer');
	}
	
	public function hapus_pemesanan($id)
	{
		//var_dump($id);exit;
		//$this->cart->remove('id');
		//$this->cart->destroy();
		//redirect('welcome');
		$data = array(
			'rowid'   => $id,
			'qty'     => 0
			);
			
			$this->cart->update($data);

			redirect('welcome');
	}
	
	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');

		if($this->session->userdata('role_id')!= '2'){
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
	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if ($is_processed){
			$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('proses_pesanan');
		$this->load->view('templates/footer');
		}else{
			echo "Maaf Pesanan Anda Gagal Di Prosses!!!";
		}
		
	}
	public function detail($id_krn)
	{
		$data['kontrakan']= $this->model_kontrakan->detail_krn($id_krn);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_kontrakan',$data);
		$this->load->view('templates/footer');
	}


}

