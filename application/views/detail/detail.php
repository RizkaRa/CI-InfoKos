<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail</title>
	<!-- css style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<!-- css Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap/bootstrap.min.css">
	<!-- css fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/fontawesome/all.min.css">
	<!-- css animated -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/animated/animate.min.css">
	<!-- JQuery -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/main.js"></script>
</head>
<body class="bg-header">
	<nav class="navbar navbar-expand-lg navbar-inverse fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?=base_url()?>index.php#search"><i class="fas fa-home"></i> INFO <span>KOS</span></a>
		  <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbar-menu">
		    <ul class="navbar-nav ml-auto">
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php">Home</a></li>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php#search">Cari kos</a></li>
		    	<?php 
		    	if (! isset ($_SESSION['level'])):?>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php/login">Login</a></li>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php/login/register">Register</a></li>
		    	<?php else : ?>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php/Login">Dashboard</a></li>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php/login/logout">Logout</a></li>
		    	<?php endif ?>
		    </ul>
		  </div>
		</div>
	</nav>
	<div class="main" id="detail">
		<?php foreach($detailkos->result_object() as $dkos):?>
		<div class="container">
			<h2 style="font-weight: bold; color: #fff;"><?=$dkos->nama_kos?></h2>	
			<div class="row">
				<div class="col-md-7 p-2">
					<div class="card-slide shadow-sm">
						<img src="<?=base_url()?>assets/img/kos/<?=$dkos->gmb_kos;?>">
					</div>
					<br>
					<div class="card-kos shadow">
						<div class="card-header">
							Deskripsi
						</div>
						<div class="card-body">
							<?=$dkos->deskripsi?>
						</div>
					</div>
				</div>
				<div class="col-md-5 p-2" >
					<p><button class="btn btn-success btn-block">Rp. <?=number_format($dkos->harga,0,",",".");?> / Bulan</button></p>
					<p><a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#myModalPesan"><i class="fa fa-comment"></i> Pesan</a></p>
					<div class="card-kos shadow" >
						<div class="card-header" >
							Informasi Kos
						</div>
						<div class="card-body">
							<table class="table-striped table">
								
								<tr>
									<td>Pemilik Kos</td>
									<td>: <?=$dkos->nama?></td>
								</tr>
								<tr>
									<td>No. Hp / WA</td>
									<?php 
			    					
			    					if (! isset ($_SESSION['level'])):?>
									<td>: <a class="badge badge-danger" href="<?=base_url()?>index.php/login">Login</a> <a class="badge badge-primary" href="<?=base_url()?>index.php/login/register">Register</a></td>
									<?php else :?>
									<td>: <?=$dkos->no_hp;?></td>
									<?php endif ?>
								</tr>
								
								<tr>
									<td>Untuk</td>
									<td>: <?=$dkos->untuk;?></td>
								</tr>
								<tr>
									<td>Luas Kamar</td>
									<td>: <?=$dkos->luas ;?></td>
								</tr>
								<tr>
									<td>Kamar Kosong</td>
									<td>: <?=$dkos->jml_kamar;?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>: <?=$dkos->alamat_kos;?></td>
								</tr>
								<tr>
									<td>Fasilitas</td>
									<td>: <?=$dkos->fasilitas?></td>
								</tr>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	<?php endforeach ?>
	</div>
	<br>
	<footer >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>&copy; 2019 - <a href="#">Info kos</a></h2>
				</div>
			</div>
		</div>
	</footer>

	<!-- Modal tambah -->
	<div class="modal fade" id="myModalPesan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" style="text-transform: uppercase;">Pesan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<?php foreach($detailkos->result_object() as $dkos): ?>
				<form action="<?=base_url('index.php/home/tambahpesan')?>" method="post">
					<input type="hidden" name="id" value="<?=$dkos->id_kos?>">
					<?php if(! isset($_SESSION['level'])){?>
					<div class="modal-body">
						<div class="form-group text-center">
							<label>Silahkan</label>
							<p><a class="btn btn-primary" href="<?=base_url()?>index.php/login">Login</a> or <a class="btn btn-danger" href="<?=base_url()?>index.php/login/register">Register</a></p>
							
						</div>
					</div>
					<?php }else if($_SESSION['level']=='2'){?>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama</label>
							<input class="form-control" type="text" name="nama" value="<?=$_SESSION['nama'];?>" required>
						</div>
						<div class="form-group">
							<label>No Hp / WA</label>
							<input class="form-control" type="text" name="no_hp" value="<?=$_SESSION['no_hp'];?>" required>
						</div>
						<div class="form-group">
							<label>Comment</label>
							<textarea class="form-control" name="comment" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal" type="button">Kembali</button>
						<button class="btn btn-primary" type="submit">Kirim</button>
					</div>
					<?php }else{?>
					<div class="form-body">
						<div class="form-group text-center">
							<label>Hanya Pencari Yang Bisa Memesan</label>
							<p>
								<a class="btn btn-primary" href="<?=base_url()?>index.php/login">Login</a> or 
								<a class="btn btn-danger" href= "<?=base_url()?>index.php/login/register">Regisater</a>	
							</p>
						</div>
					</div>
					<?php }?>
				</form>
			<?php endforeach?>
			</div>
		</div>
	</div>
	<!-- End Modal tambah -->

	<!-- js bootstrap-->
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- js fontawesome-->
	<script type="text/javascript" src="<?=base_url()?>assets/js/fontawesome/all.min.js"></script>
</body>
</html>