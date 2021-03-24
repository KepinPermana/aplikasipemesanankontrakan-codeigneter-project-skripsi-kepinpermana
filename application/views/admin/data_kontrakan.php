<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_kontrakan"><i class="fas fa-plus fa-sm"></i> Tambah Kontrakan</button>
	<table class="table table-bordered">
		
	<div class="modal-dialog" align="center">
    
    
	<?php echo $this->session->flashdata('success'); ?>

	</div>

		<tr>
			<th>NO</th>
			<th>NAMA KONTRAKAN</th>
			<th>KETERANGAN</th>
			<th>KATAGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php 
		$no=1;
		foreach($kontrakan as $krn): ?>

			<tr>
				<td><?php echo $no++?></td>
				<td><?php echo $krn->nama_krn?></td>
				<td><?php echo $krn->keterangan ?></td>
				<td><?php echo $krn->katagori ?></td>
				<td><?php echo $krn->harga ?></td>
				<td><?php echo $krn->stok ?></td>
				<td><?php echo anchor('admin/data_kontrakan/edit/'.$krn->id_krn,'<div class="btn btn-success btn-sm"><i class="fas fa-fw  fa-edit"></i></div>') ?></td>
				<td><?php echo anchor('admin/data_kontrakan/hapus/'.$krn->id_krn,'<div class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>


	</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_kontrakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Kontrakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form action="<?php echo base_url().'admin/data_kontrakan/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

			
			<div class="form-group">
				<label>Nama Kontrakan</label>
				<input type="text" name="nama_krn" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Katagori Kontrakan</label>
				<select class="form-control" name="katagori" >
					<option>Syariah</option>
					<option>Biasa</option>
					<option>Rumahan</option>
					<option>Peralatan Rumah</option>
				</select>
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" required> 
			</div>
			<div class="form-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control" required> 
			</div>
			<div class="form-group">
				<label>Gambar Kontrakan</label><br>
				<input type="file" name="gambar" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Pemilik Kontrakan</label>
				<input type="text" name="nama_pemilik" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nomer Pemilik Kontrakan</label>
				<input type="text" name="no_pemilik" class="form-control">
			</div>
			<div class="form-group">
				<label>Alamat Pemilik Kontrakan</label>
				<input type="text" name="alamat_pemilik" class="form-control">
			</div>
			<div class="form-group">
				<label>Luas Hunian</label>
				<input type="text" name="luas" class="form-control">
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
