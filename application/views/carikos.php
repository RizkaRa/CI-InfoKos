<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashbord</title>
	<!-- css style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/style.css">
	<!-- css Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/bootstrap/bootstrap.min.css">
	<!-- css fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/fontawesome/all.min.css')?>">
	<!-- css animated -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/animated/animate.min.css">
	<!-- JQuery -->
	<script type="text/javascript" src="<?=base_url('assets/')?>js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/')?>js/main.js"></script>
</head>
<body class="bg-header">
	<nav class="navbar navbar-expand-lg navbar-inverse fixed-top shadow">
		<div class="container">
			<a class="navbar-brand" href="<?=base_url()?>index.php"><i class="fas fa-home"></i> INFO <span>KOS</span></a>
		  <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class=" navbar-nav  navbar-collapse" id="navbar-menu">
		  	<div class=" button">
		  		<ul class="navbar-nav" >
					<li><a class="nav-link" href="<?=base_url()?>index.php/home/lk">Laki-laki</a></li>
					<li><a class="nav-link" href="<?=base_url()?>index.php/home/pr">Perempuan</a></li>
					<li><a class="nav-link" href="<?=base_url()?>index.php/home/cmp">Campur</a></li>
					<li><a class="nav-link" href="<?=base_url()?>index.php/home/semua">Semua Kos</a></li>
				</ul>
		  	</div>
		    	<ul class="navbar-nav ml-auto">
			    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php#home">Home</a></li>
			    	<li class="nav-item"><a class="nav-link" href="<?=base_url()?>index.php#search">Cari kos</a></li>
			    	<?php if (! isset ($_SESSION['level'])):?>
			    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php/Login')?>">Login</a></li>
			    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php/login/register')?>">Register</a></li>
			    	<?php else :?>
			    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php/Login')?>">Dashboard</a></li>
			    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php/Login/logout')?>">Logout</a></li>
			    	<?php endif?>
			    </ul>
		  </div>
		</div>
	</nav>
	
	<div class="main ">
		<div class="container">
			<div class="row">
			<?php foreach($kos->result_object() as $k){ ?>
				<div class="col-sm-3 p-2">
			     	<div class="card-kos shadow" style="width: 100%; ">
			        	<img style="width: 100%; height: 25vh;" src="<?=base_url('assets/')?>img/kos/<?=$k->gmb_kos?>">
			        	<h2 class="harga">Rp. <?=number_format($k->harga,0,",",".")?> / bulan</h2>
		          		<div class="container p-2 ">	
		            		<h6 class="badge badge-success" style="font-size: 12px; font-weight: bold;"><?=$k->untuk?></h6>
		              		<h5><?=$k->nama_kos?></h5>
		                	<p ><i class="fas fa-map-marker-alt"></i> <?= $k->alamat_kos?></p>
		                	<a style="position: relative;" class="btn btn-block btn-outline-primary btn-sm" href="<?=base_url('index.php/home/detail')?>/<?=$k->id_kos?>">DETAIL</a>
			          	</div>
			    	</div>
		        </div>
		    	<?php }?>
			</div>
		</div>
	</div>
	<!-- js bootstrap-->
	<script type="text/javascript" src="<?=base_url('assets/')?>js/bootstrap/bootstrap.min.js"></script>
	<!-- js fontawesome-->
	<script type="text/javascript" src="<?=base_url('assets/')?>js/fontawesome/all.min.js"></script>
</body>
</html>