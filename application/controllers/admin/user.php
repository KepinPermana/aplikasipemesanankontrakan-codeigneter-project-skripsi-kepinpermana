<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
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
        $this->load->model('User_model');
        $data['row'] = $this->User_model->get();

        //$data = $this->model_kontrakan->hitung();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates_admin/footer');
		}
		
		public function tambah()
		{
			$username = $this->input->post('username');
			$role_id = $this->input->post('role_id');
			$password = $this->input->post('password');
		
			$data = array (
			'username'	 		=> $username ,
			'role_id'	 			=> $role_id,
			'password' 			=> md5($password)
		);

		$this->session->set_flashdata('success', 'Anda Berhasil Tambah Data');

		$this->User_model->get_user($data,'tb_user');
			redirect('admin/user/index');
	}


	public function edit($id)
		{
			$where = array('id' => $id);
			$data['user'] = $this->User_model->get_edit($where,'tb_user')->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/user/edit', $data);
			$this->load->view('templates_admin/footer');	
		}

		public function update(){
			$id					=$this->input->post('id');
			$username			=$this->input->post('username');
			$role_id			=$this->input->post('role_id');
			$password			=$this->input->post('password');

			$data = array(
				'username'		=>$username,
				'role_id'    =>$role_id,
				'password'		=>$password
			);
			$where = array(
				'id'=> $id
			);
			$this->User_model->get_update($where,$data,'tb_user');
 			redirect('admin/user/index');
		}

		public function hapus($id)
		{
			$where = array('id' => $id);
			$this ->User_model->get_hapus($where, 'tb_user');

			$this->session->set_flashdata('success', 'Anda Berhasil Menghapus');

			redirect('admin/user/index');
		}


}
