

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
									<div class="modal-dialog" align="center">
									<?php echo $this->session->flashdata('success'); ?>
									</div>
                    <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
				  </div>
				  <?php echo $this->session->flashdata('pesan') ?>
                  <form method="post" action="<?php base_url('auth/login') ?>" class="user">
                    <div class="form-group">
					  <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username Anda" 
						name="username" >
						<?php echo form_error('username','<div class="text-danger small ml-2">','</div'); ?>
                    </div>
                    <div class="form-group">
											<input type="password" class="form-control form-control-user ml-2" id="exampleInputPassword" placeholder="Masukan Password Anda" name="password">
						<?php echo form_error('password','<div class="text-danger small">','</div'); ?>					
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Login</button>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('registrasi/index'); ?>">Anda Pencari Kontrakan ? Daftar</a>
                  </div>
									<div class="text-center">
                    <a class="small" href="<?php echo base_url('registrasi_pemilik/index'); ?>">Anda Pemilik Kontrakan ? Daftar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</html>