<div class="container-fluid">

	<h3><i class="fas fa-edit"></i>	EDIT INVOICE</h3>

	<?php foreach($user as $usr) : ?>


<form method="post" action="<?php echo base_url().'admin/invoice/update' ?>">

<div class="for-group">
	<label>Nama</label>
	<input type="hidden" name="id" class="form-control" value="<?php echo $usr->id ?>">
	<input type="text" name="nama" class="form-control" value="<?php echo $usr->nama ?>">
</div>

<div class="for-group">
	<label>alamat</label>
	
	<input type="text" name="alamat" class="form-control" value="<?php echo $usr->alamat ?>">
</div>
<div class="for-group">
	<label>Tanggal Pesan</label>
	<input type="text" name="tgl_pesan" class="form-control" value="<?php echo $usr->tgl_pesan ?>">
</div>
<div class="for-group">
	<label>Batas Bayar</label>
	<input type="date" name="batas_bayar" class="form-control" value="<?php echo $usr->batas_bayar ?>">
</div>
<div class="for-group">
	<label>Status</label>
	<input type="text" name="status" class="form-control" value="<?php echo $usr->status ?>">
</div>


<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

</form>


<?php endforeach; ?>


</div>

