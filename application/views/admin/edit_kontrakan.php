<div class="container-fluid">

	<h3><i class="fas fa-edit"></i>	EDIT DATA KONTRAKAN</h3>

	<?php foreach($kontrakan as $krn) : ?>


		<form method="post" action="<?php echo base_url().'admin/data_kontrakan/update' ?>">
		
		<div class="for-group">
			<label>Nama Kontrakan</label>
			<input type="text" name="nama_krn" class="form-control" value="<?php echo $krn->nama_krn ?>">
		</div>

		<div class="for-group">
			<label>Keterangan</label>
			<input type="hidden" name="id_krn" class="form-control" value="<?php echo $krn->id_krn ?>">
			<input type="text" name="keterangan" class="form-control" value="<?php echo $krn->keterangan ?>">
		</div>

		<div class="for-group">
			<label>Katagori</label>
			<input type="text" name="katagori" class="form-control" value="<?php echo $krn->katagori ?>">
		</div>

		<div class="for-group">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" value="<?php echo $krn->harga ?>">
		</div>

		<div class="for-group">
			<label>Stok</label>
			<input type="text" name="stok" class="form-control" value="<?php echo $krn->stok ?>">
		</div>
		<div class="for-group">
			<label>Nama Pemilik Kontrakan</label>
			<input type="text" name="nama_pemilik" class="form-control" value="<?php echo $krn->nama_pemilik ?>">
		</div>
		<div class="for-group">
			<label>Nomer Pemilik Kontraka</label>
			<input type="text" name="no_pemilik" class="form-control" value="<?php echo $krn->no_pemilik ?>">
		</div>
		<div class="for-group">
			<label>Alamat Kontrakan</label>
			<input type="text" name="alamat_pemilik" class="form-control" value="<?php echo $krn->alamat_pemilik ?>">
		</div>
		<div class="for-group">
			<label>Luas Kontrakan</label>
			<input type="text" name="luas" class="form-control" value="<?php echo $krn->luas ?>">
		</div>





		<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
		
		</form>


	<?php endforeach; ?>

</div>
