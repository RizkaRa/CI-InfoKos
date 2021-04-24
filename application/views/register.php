<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-sclae=1.0">
	<title>Register</title>
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
	<div class="main">
		<div class="container">
			<div class="col-md-8 m-auto">
				<div class=" shadow">
					<div class="card-header">
						<div class="float-left">
							<a href="<?=base_url()?>">
							<i class="fas fa-reply" style="color: #fff; font-size: 30px;" ></i>
							</a>
						</div>
						<div class="text-center">
							<h2 style="font-weight: bold; font-size: 28px; color: #fff;">REGISTER</h2>
						</div>
						
					</div>
					<div class="card-body" style="color: #fff;">
						<?php if($this->session->flashdata('info')){ ?> 
					    <div class="alert alert-danger">
					    <?php echo $this->session->flashdata('info') ?>
					    </div>
						<?php }?>
						<form action="<?=base_url('index.php/')?>login/tambahuser" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" name="nama" required="">
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input class="form-control" type="text" name="email" required="">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input class="form-control" type="password" name="password" required="">
									</div>
									<div class="form-group">
										<label>No. HP</label>
										<input class="form-control" type="text" name="no_hp" maxlength="13" required="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Gender</label>
										<select class="form-control" name="gender">
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input class="form-control" type="date" name="tgl_lahir" required="">
									</div>
									<div class="form-group">
										<label>Tempat Lahir</label>
										<input class="form-control" type="text" name="tmpt_lahir" required="requiered">
									</div>
									<div class="form-group">
										<label>Gabung Sebagai</label>
										<select class="form-control" name="level">
											<option value="2">Pencari</option>
											<option value="3">Pemilik</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-block" type="submit">REGISTER</button>
							</div>
							<div class="form-group">
								<a class="btn btn-success btn-block" href="<?=base_url()?>index.php/login">LOGIN</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- js bootstrap-->
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- js fontawesome-->
	<script type="text/javascript" src="<?=base_url()?>assets/js/fontawesome/all.min.js"></script>
</body>
</html>