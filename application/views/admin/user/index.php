<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center>
                <h3><b>Data Semua User</b></h3>
            </center>
		</div>

	<div class="modal-dialog">
    
    
		<?php echo $this->session->flashdata('success'); ?>
	
	</div>

			

        <div class="card-body">
		<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus fa-sm"></i> Tambah User</button>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th style="width: 30px">No</th> -->
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <!-- <td class="pl-4"><?= $no++ ?></td> -->
                                <td><?= $data->username ?></td>
                                <td><?= $data->nama_level?></td>
            
                                <td class="text-center" width="200px">
									<?php echo anchor('admin/user/edit/'.$data->id,'<div class="btn btn-success btn-sm"><i class="fas fa-fw fa-edit"></i></div>') ?>
									<?php echo anchor('admin/user/hapus/'.$data->id,'<div class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></div>') ?>
                                    </td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>



		<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form action="<?php echo base_url().'admin/user/tambah'; ?>" method="post" enctype="multipart/form-data">

			
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" required>
			</div>
			<div class="form-group">
		
				<select class="form-control" name="role_id" >
					<option value="1">Admin</option>
					<option value="2">Customer</option>
				</select>
			</div>
			<div class="form-group">
				<label>password</label>
				<input type="password" name="password" class="form-control" required> 
			</div>
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
	  </div>
		</form>
	</div>
  </div>
</div>



    </div>
</div>
