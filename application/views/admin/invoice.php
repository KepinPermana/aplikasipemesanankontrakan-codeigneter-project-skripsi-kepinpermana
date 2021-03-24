<div class="container-fluid">

	<h4>Invoice Pemesanan Kontrakan</h4>

	

	<table class="table table-bordered table-hover table-striped">


	<div class="modal-dialog" align="center">
    
    
	<?php echo $this->session->flashdata('success'); ?>

	</div>

		<tr>
			<th>Id Invoice</th>
			<th>Nama Pemesan</th>
			<th>Alamat</th>
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>

		<?php foreach ($invoice as $inv): ?>
		<tr>
			<td><?php echo $inv->id  ?></td>
			<td><?php echo $inv->nama  ?></td>
			<td><?php echo $inv->alamat  ?></td>
			<td><?php echo $inv->tgl_pesan  ?></td>
			<td><?php echo $inv->batas_bayar  ?></td>
			<td><?php echo $inv->status  ?></td>
			<td>
			<?php echo anchor('admin/invoice/edit/'.$inv->id,'<div class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></div>') ?>
			<?php echo anchor('admin/invoice/detail/'.$inv->id,'<div class="btn btn-sm btn-success"><i class="fas fa-fw fa-search"></i></div>')?>
			<?php echo anchor('admin/invoice/hapus/'.$inv->id,'<div class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></div>') ?>
			<?php echo anchor('admin/invoice/cetak_laporan/'.$inv->id,'<div class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-print"></i></div>') ?>
			
			</td>
			

		</tr>

		<?php endforeach; ?>

	</table>

</div>
