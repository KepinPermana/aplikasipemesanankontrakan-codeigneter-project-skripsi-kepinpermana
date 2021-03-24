<div class="container-fluid">

<h4>Keranjang Pemesanan</h4>
<table class="table table-bordered table-striped table-hover">

	<tr>
		<th>NO</th>
		<th>Nama Kontrakan</th>
		<th>Sisa Kontrakan</th>
		<th>Jumlah</th>
		<th>Harga</th>
		<th>Sub-Total</th>
		<th>Aksi</th>
		
	</tr>

	<?php
	$no=1;
	foreach ($this->cart->contents() as $items) : ?>
	<?php //var_dump($items);exit; ?>

	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $items['name']?></td>
		
	<?php $id_krn = $items['id'];
	$query =$this->db->query("SELECT * FROM tb_kontrakan where id_krn= $id_krn ");
	foreach($query->result() as $row) {
	?>	
		<td><?php  echo $row->stok; ?></td>
	<?php } ?>
		
<?php ?>
		<td><?php echo $items['qty']?></td>
		<td align="right" >Rp. <?php echo number_format($items['price'],0,',','.') ?></td>
		<td align="right" >Rp. <?php echo number_format($items['subtotal'],0,',','.') ?></td>
		<td>
		 <?php echo anchor('dashboard/hapus_pemesanan/'.$items['rowid'],'<div class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></div>') ?>
		</td>
		
		
	</tr>
	<?php endforeach; ?>

	<tr id="demo">
		<td colspan="4"></td>
	<td align="right">Rp. <?php echo number_format($this->cart->total() ,0,',','.') ?></td>
	</tr>
</table>


<div align="right">
	<!--<a href="<?php echo base_url('dashboard/hapus_pemesanan/')?>">
	<div class="btn btn-sm btn-danger">Cancel Pemesanan</div></a>-->
	
	<a href="<?php echo base_url('welcome/')?>">
	<div class="btn btn-sm btn-primary">Tambah Lagi Pemesanan</div></a>

	<a href="<?php echo base_url('dashboard/pembayaran/')?>">
	<div class="btn btn-sm btn-success">Lanjutkan Pemesanan</div></a> 

</div>

</div>
<script>
function myFunction(){
	var myobj =
	document.getElementById("demo");
	myobj.remove();
}
</script>
