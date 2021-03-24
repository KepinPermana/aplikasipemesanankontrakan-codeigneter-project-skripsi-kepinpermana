<div class="container-fluid">

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
			
			<?php 
			
			$grand_total =0;
			if ($keranjang =$this->cart->contents())
			{
				foreach ($keranjang as $item)
				{
					$grand_total = $grand_total + $item['subtotal'];
				}
				echo "<h4>Total Pemesanan Anda : RP.".number_format($grand_total,0,',','.');
			
			
			?>
			</div><br><br>
			<h3>Input Data Diri Anda Untuk Melakukan Pemesanan</h3>

			<form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan ">
			
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required oninvalid="this.setCustomValidity('Anda Belum Memasukan Nama Lengkap Anda !!')" oninput="setCustomValidity('')">
			</div>

			<div class="form-group">
				<label>Alamat Lengkap</label>
				<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required oninvalid="this.setCustomValidity('Anda Belum Alamat Lengkap Anda !!')" oninput="setCustomValidity('')">
			</div>

			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="no_tlp"  class="form-control" required oninvalid="this.setCustomValidity('Anda Belum Memasukan No Tlp Anda !!')" oninput="setCustomValidity('')" placeholder="Nomer Whatsapp">
			</div>
			<div class="form-group">
				<label>Tanggal Ingin Memulai Menghuni</label>
				<input type="date" name="tgl_masuk" placeholder="Masukan Tanggal" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Lama Penyewaan Kontrakan</label>
				<select class="form-control">
					<option>Pertahun</option>
					<option>Perbulan</option>
				</select>
			</div>
			<button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
			
			</form>
			<?php }else{
				echo "<h4>Keranjang Pemesanan Kontrakan Anda Masih Kosong";
			} ?>

		</div>
		<div class="col-md-2"></div>
	</div>

</div>
