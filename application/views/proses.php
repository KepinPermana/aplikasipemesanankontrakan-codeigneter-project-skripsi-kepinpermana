<div class="container-fluid">

	<h4>Table Transasksi Pembayaran Semua Costumer</h4>

	<table class="table table-bordered table-hover table-striped">

		<tr>
			<th>Id Invoice</th>
			<th>Nama Pemesan</th>
			<th>Alamat</th>
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
			<th>Status</th>
			
		</tr>

		<?php foreach ($row->result() as $key => $data) { ?>
		<tr>
			<td><?php echo $data->id  ?></td>
			<td><?php echo $data->nama  ?></td>
			<td><?php echo $data->alamat  ?></td>
			<td><?php echo $data->tgl_pesan  ?></td>
			<td><?php echo $data->batas_bayar  ?></td>
			<td><?php echo $data->status  ?></td>
			

		</tr>

		<?php } ?>

	</table>

</div>



























<!-- <div class="container-fluid">


    <!-- DataTales Example 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center>
                <h3><b>Data Pembayaran Sewa Kontrakan</b></h3>
            </center>
        </div>
        <div class="card-body">
		<!--<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus fa-sm"></i> Tambah User</button>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th style="width: 30px">No</th> 
                            <th>NAMA KONTRAKAN</th>
                            <th>NAMA PEMESAN</th>
                            <th>JUMLAH</th>
							<th>GAMBAR</th>
							<th>STATUS</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                 <td class="pl-4"><?= $no++ ?></td>
                                <td><?= $data->nama_krn ?></td>
                                <td><?= $data->nama_pemesan ?></td>
                                <td><?= $data->jumlah ?></td>
								<td><?= $data->gambar ?></td>
								<td><?= $data->status ?></td>
                                <td class="text-center" width="200px">
									<?php echo anchor('admin/user/edit/'.$data->id,'<div class="btn btn-warning btn-sm">Download</div>') ?>
                                    </td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

						-->
