

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
				  <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
				</div>
				<?php echo $this->session->flashdata('pesan') ?>
				<form method="post" action="<?php base_url('auth/ubah_password_aksi') ?>">
				  <div class="form-group">
					<input type="password" class="form-control form-control-pass_baru" id="pass_baru" aria-describedby="emailHelp" placeholder="Password Baru" 
					  name="pass_baru">
					  <?php echo form_error('pass_baru','<div class="text-danger small ml-2">','</div'); ?>
				  </div>
				  <div class="form-group">
					<input type="text" class="form-control form-control-ulangi_pass ml-2" id="ulangi_pass" placeholder="Ulangi Password" name="ulangi_pass">
					  <?php echo form_error('ulangi_pass','<div class="text-danger small">','</div'); ?>					
				  </div>
				  
				  <button type="submit" class="btn btn-primary form-control">Ubah Password</button>

				</form>
				<hr>
				<div class="text-center">
				  <a class="small" href="<?php echo base_url('registrasi/index'); ?>">Belum Punya Akun ? Daftar</a>
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
