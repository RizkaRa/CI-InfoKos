<?php
error_reporting(0);
session_start();
// jika sudah login, alihkan ke halaman home
if ($_SESSION['level']=="1") {
    header("Location: admin/index");
}elseif($_SESSION['level']=="2") {
	header("Location: pencari/index");
}elseif($_SESSION['level']=="3"){
	header("Location: pemilik/index");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-sclae=1.0">
	<title>Login</title>
	<!-- css style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/style.css">
	<!-- css Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/bootstrap/bootstrap.min.css">
	<!-- css fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/fontawesome/all.min.css">
	<!-- css animated -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/animated/animate.min.css">
	<!-- JQuery -->
	<script type="text/javascript" src="<?=base_url('assets/')?>js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/')?>js/main.js"></script>
</head>
<body class="bg-header">
	<div class="main">
		<div class="container">
			<div class="col-md-4 m-auto">
				<div class=" shadow">
					<div class="card-header text-center">
						<div class="float-left">
							<a href="<?=base_url()?>">
							<i class="fas fa-reply" style="color: #fff; font-size: 30px;margin: 5px;" ></i>
							</a>
						</div>
						<h2 style="font-weight: bold; font-size: 28px; color: #fff;">LOGIN</h2>
					</div>
					<div class="card-body">
						<?php if($this->session->flashdata('info')){ ?> 
				        <div class="alert alert-danger">
				        <?php echo $this->session->flashdata('info') ?>
				        </div>
				        <?php } ?>
						<?= form_open('Login/proses_login')?>
						<?php if(isset($pesan)){
							echo $pesan;
						}
						?>
							<div class="form-group">
								<input class="form-control" type="text" name="email" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<input class="form-control" type="password" name="password" placeholder="Password" required=>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-block" type="submit" name="login">LOGIN</button>
							</div>
							<div class="form-group">
								<a class="btn btn-success btn-block" href="<?=base_url()?>index.php/login/register">REGISTER</a>
							</div>
						<?= form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>

		<!-- js bootstrap-->
	<script type="text/javascript" src="<?=base_url('assets/')?>js/bootstrap/bootstrap.min.js"></script>
	<!-- js fontawesome-->
	<script type="text/javascript" src="<?=base_url('assets/')?>js/fontawesome/all.min.js"></script>
</body>
</html>