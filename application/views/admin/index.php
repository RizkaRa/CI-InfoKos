<?php $this->load->view('template/header');?>

<div class="container">
	<div class="row ">
		<div class="col-xl-3 col-lg-6">
			<div class="card  text-center">
				<div class="card-body">
					<div style="font-size: 50px" >
						<i class="fas fa-user"></i>
					</div>
					<h2>Data User</h2>
					<p style="font-size: 30px"><?=$user?></p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6">
			<div class="card text-center">
				<div class="card-body">
					<div style="font-size: 50px">
						<i class="fas fa-palette" ></i>
					</div>
					<h2>Data Fasilitas</h2>
					<p style="font-size: 30px"><?=$fasilitas?></p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6">
			<div class="card text-center">
				<div class="card-body">
					<div style="font-size: 50px">
						<i class="fas fa-home"></i>
					</div>
					<h2>Data KOS</h2>
					<p style="font-size: 30px"><?=$datakos?></p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6">
			<div class="card text-center">
				<div class="card-body">
					<div style="font-size: 50px">
						<i class="fas fa-paper-plane"></i>
					</div>
					<h2>Data Iklan</h2>
					<p style="font-size: 30px"><?=$iklan?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer');?>

