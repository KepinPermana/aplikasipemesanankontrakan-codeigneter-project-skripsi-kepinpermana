<?php 

	class Data_kontrakan extends CI_Controller
	{

		public function __construct()
	{
		parent ::__construct();

		if($this->session->userdata('role_id')!= '3'){
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
			$data['kontrakan']=$this->model_kontrakan->tampil_data_pemilik_kontrakan()->result();
			$this->load->view('templates_pemilik/header');
			$this->load->view('templates_pemilik/sidebar');
			$this->load->view('pemilik/data_kontrakan',$data);
			$this->load->view('templates_pemilik/footer');	
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
				'gambar'			=>$gambar,
				'tb_user_id'		=>$this->session->userdata('user_id')
			


		);

			$this->model_kontrakan->tambah_kontrakan_pemilik($data,'tb_kontrakan');
			redirect('pemilik_kontrakan/data_kontrakan/index');

		}
		
		public function edit($id)
		{
			// $where = array('id_krn' => $id);
			// var_dump( $this->model_kontrakan->edit_kontrakan(['id_krn' => $id],'tb_kontrakan')->result()[0]); exit;
			$isi= $this->model_kontrakan->edit_kontrakan(['id_krn' => $id],'tb_kontrakan')->result();

			if($isi)
			{
				$data['krn'] = $isi[0]; //$this->model_kontrakan->edit_kontrakan(['id_krn' => $id],'tb_kontrakan')->result()[0];
				$data['tb_kontrakan_status'] = $this->model_kontrakan->tb_kontrakan_status()->result();
				//var_dump($data['kontrakan']); exit;
				$this->load->view('templates_pemilik/header');
				$this->load->view('templates_pemilik/sidebar');
				$this->load->view('pemilik/edit_kontrakan', $data);
				$this->load->view('templates_pemilik/footer');	
			}
			else
			{
				$this->session->set_flashdata('success', 'Data Kontrakan tidak ditemukan !!!');
 				redirect('pemilik_kontrakan/data_kontrakan/index');
			}

		}
		public function update(){
			$id					=$this->input->post('id_krn');
			$nama_krn			=$this->input->post('nama_krn');
			$keterangan			=$this->input->post('keterangan');
			$katagori							=$this->input->post('katagori');
			$harga								=$this->input->post('harga');
			$stok								=$this->input->post('stok');
			// $tb_kontrakan_status				=$this->input->post('tb_kontrakan_status_kepin');


			$data = array(
				'nama_krn'						=>$nama_krn,
				'keterangan'  				  	=>$keterangan,
				'katagori'						=>$katagori,
				'harga' 						=>$harga,
				'stok'							=>$stok,
				'tb_kontrakan_status_id'	 	=>$this->input->post('tb_kontrakan_status_kepin')
			);
			$where =[
				'id_krn'=> $id
				//'tb_kontrakan_status'=>$id
			];

			
			// var_dump($data);exit;

			$hasil=$this->model_kontrakan->update_data($where,$data,'tb_kontrakan');
			// var_dump($hasil);exit;
			if($hasil){
				$this->session->set_flashdata('success', 'Data Kontrakan Berhasi Di Edit !!!');	
			}else{
				$this->session->set_flashdata('success', 'Data Kontrakan Gagal Di Edit !!!');
			}
 			redirect('pemilik_kontrakan/data_kontrakan/index');
		}
		public function hapus($id)
		{
			$where = array('id_krn' => $id);
			$this ->model_kontrakan->hapus_data($where, 'tb_kontrakan');

			$this->session->set_flashdata('success', 'Data Kontrakan Berhasi Di Hapus !!!');

			redirect('admin/data_kontrakan/index');
		}
				public function edit_kontrakan_status()
		{
			$data['tb_kontrakan_status'] = $this->model_kontrakan->tb_kontrakan_status()->result();
		}
		
	}
