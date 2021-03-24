<?php 

	class Data_kontrakan extends CI_Controller
	{

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
			$data['kontrakan']=$this->model_kontrakan->tampil_data()->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_kontrakan',$data);
			$this->load->view('templates_admin/footer');	
		}

		public function tambah_aksi()
		{
			
			$nama_krn = $this->input->post('nama_krn');
			$keterngan = $this->input->post('keterangan');
			$katagori = $this->input->post('katagori');
			$harga = $this->input->post('harga');
			$stok = $this->input->post('stok');
			$nama_pemilik = $this->input->post('nama_pemilik');
			$no_pemilik = $this->input->post('no_pemilik');
			$alamat_pemilik = $this->input->post('alamat_pemilik');
			$luas = $this->input->post('luas');

			$gambar=$_FILES['gambar']['name'];
			if($gambar=''){}else{
				$config ['upload_path'] ='./uploads'; 
				$config ['allowed_types'] ='jpg|jpeg|png|gif'; 

				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('gambar')){
					echo "Maaf Gambar Gagal Di Upload";
				}else{
					$gambar=$this->upload->data('file_name');
				}
			}
			$data = array (
				'nama_krn' 			=> $nama_krn ,
				'keterangan' 		=> $keterngan,
				'katagori' 			=>$katagori,
				'harga' 			=> $harga,
				'stok' 				=> $stok,
				'nama_pemilik' 		=> $nama_pemilik,
				'no_pemilik' 		=> $no_pemilik,
				'alamat_pemilik' 	=> $alamat_pemilik,
				'luas' 				=> $luas,
				'gambar'			=>$gambar
				


		);

			$this->model_kontrakan->tambah_kontrakan($data,'tb_kontrakan');
			redirect('admin/data_kontrakan/index');

		}
		
		public function edit($id)
		{
			$where = array('id_krn' => $id);
			$data['kontrakan'] = $this->model_kontrakan->edit_kontrakan($where,'tb_kontrakan')->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/edit_kontrakan', $data);
			$this->load->view('templates_admin/footer');	
		}
		public function update(){
			$id					=$this->input->post('id_krn');
			$nama_krn			=$this->input->post('nama_krn');
			$keterangan			=$this->input->post('keterangan');
			$katagori			=$this->input->post('katagori');
			$harga				=$this->input->post('harga');
			$stok				=$this->input->post('stok');

			$data = array(
				'nama_krn'		=>$nama_krn,
				'keterangan'    =>$keterangan,
				'katagori'		=>$katagori,
				'harga' 		=>$harga,
				'stok'			=>$stok
			);
			$where = array(
				'id_krn'=> $id
			);

			$this->session->set_flashdata('success', 'Data Kontrakan Berhasi Di Edit !!!');


			$this->model_kontrakan->update_data($where,$data,'tb_kontrakan');
 			redirect('admin/data_kontrakan/index');
		}
		public function hapus($id)
		{
			$where = array('id_krn' => $id);
			$this ->model_kontrakan->hapus_data($where, 'tb_kontrakan');

			$this->session->set_flashdata('success', 'Data Kontrakan Berhasi Di Hapus !!!');

			redirect('admin/data_kontrakan/index');
		}
	}
