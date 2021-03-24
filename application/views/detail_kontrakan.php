<div class="container-fluid">


<div class="card">
  <h5 class="card-header">
    Detail Kontrakan
  </h5>
  <div class="card-body">
	<!-- perulangan Untuk Menampilkan Data Detail Kontrakan-->
	<?php foreach($kontrakan as $krn): ?>	<!--$krn Ambil Dari Function controler data kontrakan-->

    <div class="row">
		<div class="col md-4">
			<img src="<?php echo base_url().'/uploads/'.$krn->gambar ?>" class="card-img-top">
		</div>
		<div class="col md-8">
			<table class="table">
				<tr>
					<td>Nama Kontrakan : </td>
					<td><strong><?php echo $krn->nama_krn ?></strong></td>
				</tr>
				<tr>
					<td>Keterangan : </td>
					<td><strong><?php echo $krn->keterangan ?></strong></td>
				</tr>
				<tr>
					<td>Katagori : </td>
					<td><strong><?php echo $krn->katagori ?></strong></td>
				</tr>
				<tr>
					<td>Nama Pemilik Kontrakan:</td>
					<td><strong><?php echo $krn->nama_pemilik ?></strong></td>
				</tr>
				<tr>
					<td>Nomer Pemilik Kontrakan :</td>
					<td><strong><?php echo $krn->no_pemilik ?></strong></td>
				</tr>
				<tr>
					<td>Alamat Kontrakan :</td>
					<td><strong><?php echo $krn->alamat_pemilik ?></strong></td>
				</tr>
				<tr>
					<td>Luas Kamar :</td>
					<td><strong><?php echo $krn->luas ?></strong></td>
				</tr>
				<tr>
					<td>Stok : </td>
					<td><strong><?php echo $krn->stok ?></strong></td>
				</tr>
				<tr>
					<td>Harga : </td>
					<td><strong><div class="btn btn-sm btn-success">Rp.<?php echo number_format
					($krn->harga,0,',','.')  ?></div></strong></td>
				</tr>
			</table>
			<?php echo anchor('dashboard/tambah_pemesanan/'.$krn->id_krn,'<div class="btn btn-sm btn-primary">Tambah Pemesanan</div>')?>
			<?php echo anchor('welcome','<div class="btn btn-sm btn-danger">Kembali</div>')?>
		</div>
	</div>
	<?php endforeach; ?>
  </div>
</div>
</div>
