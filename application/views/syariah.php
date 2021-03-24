<div class="container-fluid">
<!--slider-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


	<div class="row text-center mt-4">

	<?php foreach($syariah as $krn) :  ?>

		<div class="card ml-3 mb-4" style="width: 16rem;">
  		<img src="<?php echo base_url().'/uploads/'.$krn->gambar ?>" class="card-img-top" alt="...">
  			<div class="card-body">
				<h5 class="card-title mb-1 mb-3"><?php echo $krn->nama_krn ?></h5>
				<small><?php echo $krn->keterangan ?></small><br>
				<span class="badge badge-success mb-3">Rp. <?php echo number_format($krn->harga,0,',','.')  ?></span>
		<?php echo anchor('dashboard/tambah_pemesanan/'.$krn->id_krn,'<div class="btn btn-sm btn-primary">Tambah Pemesanan</div>')?>
		<?php echo anchor('dashboard/detail/'.$krn->id_krn,'<div class="btn btn-sm btn-success">Detail</div>')?>
  </div>
</div>


	<?php endforeach ; ?>


	</div>
</div>
