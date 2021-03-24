<?php 


class Auth extends CI_Controller{
	public function login()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run () ==FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('form_login');
			$this->load->view('templates/footer');
		}else{
			$auth = $this->model_auth->cek_login();


			if($auth == FALSE)
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" 
				role="alert">
				Username atau Password Anda Salah!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			
			  redirect('auth/login');
			}else{
				$this->session->set_userdata('username',$auth->username);
				$this->session->set_userdata('role_id',$auth->role_id);
				$this->session->set_userdata('user_id',$auth->id);


				switch($auth->role_id){
					case 1 : redirect('admin/dashboard_admin');
				break;
					case 2 :redirect('welcome');
				break;
				case 	3  :redirect('pemilik_kontrakan/dashboard_pemilik');
				break;
				default : break;
				} 
				
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
	public function ubah_password()
	{
		$this->load->view('templates/header');
		$this->load->view('ubah_password');
		$this->load->view('templates/footer');		
	}
	public function ubah_password_aksi()
	{
		$pass_baru = $this->input->post('pass_baru');
		$ulangi_pass = $this->input->post('ulangi_pass');

		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[pass_baru]');
		$this->form_validation->set_rules('ulangi_pass','Ulangi Password','required');

		if($this->form_validation->run()== FALSE){
			$this->load->view('templates/header');
			$this->load->view('ubah_password');
			$this->load->view('templates/footer');
		}else{
			$data = array('password' =>($pass_baru));
			$id = array('user ' =>$this->session->set_userdata('id'));

			$this->model_auth->update_password($id,$data,'tb_user');

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" 
				role="alert">
				password berhasil di update!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			  redirect('auth/login');

		}
	}
}
