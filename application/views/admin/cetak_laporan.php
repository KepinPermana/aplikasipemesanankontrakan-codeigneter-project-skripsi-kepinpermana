<style type="text/css">
@media print and (width: 21cm) and (height: 33cm) {
    @page {
        margin: 1cm;
    }
}

.tabelku {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 2px;
}
</style>
<style type="text/css" media="print">
@page {
    size: portrait;
}
</style>
<br /><br /><br />

<center>
    <font size="5"><u><b>SURAT KETERANGAN PEMBAYARAN</b></u></font><br />Nomor:
    145/IV/DS/1489-KPD

<br /><br /><br />
<font align="justify">
    Yang bertandatangan di bawah ini , Saya Selaku Pimpinan Aplikasi Kossyariah :
</font><br><br><hr>
<h4> Nama Pemesan : <?php echo $invoice->nama ?></h4>
<hr>
<br>
<br>
<div class="Container-fluid">
<table class="table table-bordered table-hover table-striped">

		<tr>
			<th>No PESANAN</th>
			<th>NAMA KONTRAKAN</th>
			<th>JUMLAH PESANAN</th>
			<th>HARGA KONTRAKAN</th>
			<th>SUB TOTAL</th>
		</tr>

		<?php

			$total =0;
			foreach($pesanan as $psn) :
				$subtotal = $psn->jumlah * $psn->harga;
				$total+= $subtotal;
		
		?>

			<tr>
				<td><?php echo $psn->id_krn?></td>
				<td><?php echo $psn->nama_krn?></td>
				<td><?php echo $psn->jumlah ?></td>
				<td><?php echo number_format($psn->harga,0,',','.') ?></td>
				<td><?php echo number_format($subtotal,0,',','.')?></td>
			</tr>

			<?php endforeach; ?>

			<tr>
				<td colspan="4" align="right">
					Grand Total 
				</td>
				<td align="right">Rp.<?php echo number_format($total,0,',','.') ?></td>
			</tr>
	</table>


<br>
<br>
<br>
<br>
<br>
<p align="right"> <b>Hormat Saya</b><br><br><br><br> Kepin Peramana</p>
</div>
<script>
window.print();
</script>
