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
			<a class="navbar-brand" href="<?=base_url('index.php')?>"><i class="fas fa-home"></i> INFO <span>KOS</span></a>
		  <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbar-menu">
		    <ul class="navbar-nav ml-auto">
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php')?>#home">Home</a></li>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php')?>#search">Cari kos</a></li>
		    	<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php/')?>Login/logout">logout</a></li>
		    </ul>
		  </div>
		</div>
	</nav>
	
	<div class="main">
		<div class="container">
			<!-- Nav Tabs -->
			<ul  class="nav nav-tabs">
			<?php if($this->session->userdata('level')==1){?>
				<li class="nav-item">
					<a class="nav-link " href="<?=base_url('index.php/admin')?>">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?=base_url('index.php/admin/fasilitas')?>">Data Fasilitas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?=base_url('index.php/admin/user')?>">Data User</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('index.php/admin/iklan')?>">Iklan</a>
				</li>
			<?php }elseif($this->session->userdata('level')==2){?>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('index.php/pencari')?>">Profile</a>
				</li>
			<?php }else{?>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('index.php/pemilik')?>">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('index.php/pemilik/datakos')?>">Data Kos</a>
				</li>
				<li>
					<a class="nav-link" href="<?=base_url('index.php/pemilik/pesanan')?>">Data Pemesanan</a>
				</li>
			<?php }?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="container">
			