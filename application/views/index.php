<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Info Kos</title>
	<!-- css style -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- css slideshow -->
	<link rel="stylesheet" type="text/css" href="assets/css/slideshow.css">
	<!-- css Bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
	<!-- css fontawesome -->
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome/all.min.css">
	<!-- css animated -->
	<link rel="stylesheet" type="text/css" href="assets/css/animated/animate.min.css">
	<!-- JQuery -->
	<script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body  data-spy="scroll" data-target="#navbar-menu" data-offset="110">
	<header class="bg-header">
		<nav class="navbar navbar-expand-lg navbar-inverse fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#"><i class="fas fa-home"></i> INFO <span>KOS</span></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbar-menu">
			    <ul class="navbar-nav ml-auto">
			    	<li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
			    	<li class="nav-item"><a class="nav-link" href="#search">Cari kos</a></li>
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
	<?php if($this->session->flashdata('info')){ ?> 
	<script>alert('<?php echo $this->session->flashdata('info') ?>');document.location.href='<?=base_url('index.php');?>'</script>
	<?php } ?>
		<section id="home">
			<div class="main">
				<div class="container">
					<div class="slideshow-container">
						<?php
						$no=1;
						foreach($diklan->result_object()as $di){
						?>
						<div class="mySlides fadee shadow">
							<img  src="assets/img/iklan/<?=$di->gmb_iklan;?>" style="width: 100%;border-radius: 5px;">
						</div>
						<?php }?>
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
					<br>
					<div style="text-align:center">
					  <span class="dot" onclick="currentSlide(1)"></span> 
					  <span class="dot" onclick="currentSlide(2)"></span> 
					  <span class="dot" onclick="currentSlide(3)"></span> 
					</div>
				</div>
				<br>
				<div class="container">
					<h2 class="animated fadeInDown text-center" style="animation-delay: 1s">INFO KOS</h2>
					<p class="animated jackInTheBox" style="animation-delay: 2s">Info Kos adalah adalah sebuah website informasi untuk para pencari kos yang kebingunagan mencari tempat kos tedekat, dan juga para pemilik kos yang kebingunagan mencari orang untuk menempati kosnya. Kini kami mempermudahkan para pencari kos untuk memilih kos yang mereka inginkan dan membantu para pemilik kos untuk mengiklankan kosnya .
					</p>
					<p><a class=" animated zoomIn button" style="animation-delay: 3s" href="#search"><i class="fa fa-search"></i> CARI KOS</a></p>					
				</div>
			</div>
		</section>
		<section id="search" class="search ">
			<div class="container">
				<div class="col-sm-12 button">
					<h2>CARI KOS</h2>
					<ul class="text-center">
						<li><a class="nav-link" href="<?=base_url()?>index.php/home/lk">Laki-laki</a></li>
						<li><a class="nav-link" href="<?=base_url()?>index.php/home/pr">Perempuan</a></li>
						<li><a class="nav-link" href="<?=base_url()?>index.php/home/cmp">Campur</a></li>
						<li><a class="nav-link" href="<?=base_url()?>index.php/home/semua">Semua kos</a></li>
					</ul>
				</div>
				<div class="row">
					<?php
					$no=1;
					foreach($dkos->result_object() as $dk){
					?>
					<div class="col-sm-3 p-2">
				     	<div class="card-kos shadow" style="width: 100%; ">
				        	<img style="width: 100%; height: 25vh;" src="assets/img/kos/<?=$dk->gmb_kos?>">
				        	<h2 class="harga">Rp. <?=number_format($dk->harga,0,",",".")?> / bulan</h2>
			          		<div class="container p-2 ">	
			            		<h6 class="badge badge-success" style="font-size: 12px; font-weight: bold;"><?=$dk->untuk?></h6>
			              		<h5><?=$dk->nama_kos?></h5>
			                	<p ><i class="fas fa-map-marker-alt"></i> <?= $dk->alamat_kos?></p>
			                	<a style="position: relative;" class="btn btn-block btn-outline-primary btn-sm" href="<?=base_url('index.php/home/detail')?>/<?=$dk->id_kos?>">DETAIL</a>
				          	</div>
				    	</div>
		        	</div>
		        	<?php }?>
				</div>
			</div>
		</section>
	</header>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>&copy; 2019 - <a href="#">Info kos</a></h2>
				</div>
			</div>
		</div>
	</footer>
	<!-- js bootstrap-->
	<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- js fontawesome-->
	<script type="text/javascript" src="assets/js/fontawesome/all.min.js"></script>

	<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	var slideIndex = 0;
	showSlides();

	function showSlides() {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  for (i = 0; i < slides.length; i++) {
	    slides[i].style.display = "none";
	  }
	  slideIndex++;
	  if (slideIndex > slides.length) {slideIndex = 1}
	  slides[slideIndex-1].style.display = "block";
	  setTimeout(showSlides, 5000); // Change image every 2 seconds
	} 
</script>
</body>
</html>