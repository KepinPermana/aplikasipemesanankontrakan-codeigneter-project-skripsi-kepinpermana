<?php

class Proses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" 
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
        $this->load->model('Proses_model');
        $data['row'] = $this->Proses_model->get();

        //$data = $this->model_kontrakan->hitung();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('proses', $data);
        $this->load->view('templates/footer');
		}
		
		public function tambah()
		{
			$nama_krn = $this->input->post('nama_krn');
			$nama_pemesan = $this->input->post('nama_pemesan');
			$jumlah = $this->input->post('jumlah');
			$gambar = $this->input->post('gambar');
			$status = $this->input->post('status');

		
			$data = array (
			'nama_krn'	 				=> $nama_krn ,
			'nama_pemesan'	 			=> $nama_pemesan,
			'jumlah' 					=> $jumlah,
			'gambar'					=> $gambar,
			'status'					=> $status
		);
		$this->Proses_model->get_proses($data,'tb_sewa');
			redirect('proses');
	}


	public function edit($id)
		{
			$where = array('id' => $id);
			$data['sewa'] = $this->Proses_model->get_edit($where,'tb_sewa')->result();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses/edit', $data);
			$this->load->view('templates_admin/footer');	
		}

		public function update(){
			$id						=$this->input->post('id');
			$nama_krn				=$this->input->post('nama_krn');
			$nama_pemesan			=$this->input->post('nama_pemesan');
			$jumlah					= $this->input->post('jumlah');
			$gambar 				= $this->input->post('gambar');
			$status 				= $this->input->post('status');

			$data = array(
			'nama_krn'	 				=> $nama_krn ,
			'nama_pemesan'	 			=> $nama_pemesan,
			'jumlah' 					=> $jumlah,
			'gambar'					=> $gambar,
			'status'					=> $status
			);
			$where = array(
				'id'=> $id
			);
			$this->Proses_model->get_update($where,$data,'tb_sewa');
 			redirect('proses');
		}

		public function hapus($id)
		{
			$where = array('id' => $id);
			$this ->Proses_model->get_hapus($where, 'tb_sewa');
			redirect('proses');
		}
	}
