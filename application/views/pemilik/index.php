<?php

$this->load->view('template/header');
?>
<?php if($this->session->flashdata('info')){ ?> 
<script>alert('<?php echo $this->session->flashdata('info') ?>');document.location.href='<?=base_url('index.php/login/logoutlogin');?>'</script>
<?php } ?>
<div class="row">
	<div class="col-md-3 p-2 ml-auto text-center img-profile">
		<img src="<?=base_url('assets/')?>img/profile.png">
		<div class="p-2">
			<p>
				<a class="btn btn-outline-success btn-sm" data-toggle="modal" href="" data-target="#myModalEdit<?=$this->session->userdata('id_user')?>">Edit Profile</a>
				<a class="btn btn-outline-danger btn-sm" data-toggle="modal" href="" data-target="#myModalEditPassword<?=$this->session->userdata('id_user')?>">Ubah Password</a>
			</p>
		</div>
	</div>
	<div class="col-md-9">
		<div class="container p-2 " >
			<table class="table-striped">
				<tr>
					<th width="20%"></th>
					<th></th>
				</tr>
				<tr>
					<td>Nama</td>
					<td>: <?=$this->session->userdata('nama')?> </td>
				</tr>
				<tr>
					<td>Email</td>
					<td>: <?=$_SESSION['email']?> </td>
				</tr>
				<tr>
					<td>No. Hp/WA</td>
					<td>: <?=$this->session->userdata('no_hp')?> </td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>: <?php
						if($this->session->userdata('gender')=='L'){
							echo "Laki-laki";
						}else{
							echo "Perempuan";
						}
						?> 
					</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>: <?=date('d-m-Y',strtotime($this->session->userdata('tgl_lahir')))?> </td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td>: <?=$this->session->userdata('tmpt_lahir')?> </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <?=$this->session->userdata('alamat')?></td>
				</tr>
			</table>
		</div>
	</div>
	<!-- Modal Edit User-->
	<div class="modal fade" id="myModalEdit<?=$this->session->userdata('id_user')?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" style="text-transform: uppercase;">Edit Profile</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<form action="<?php echo site_url('pemilik/editpemilik'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Fasilitas</label>
						<input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
						<input class="form-control" type="text"  name="nama" value="<?=$this->session->userdata('nama')?>" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="text" name="email" value="<?=$this->session->userdata('email')?>" required>
					</div>
					<div class="form-group">
						<label>No.Hp/Wa</label>
						<input class="form-control" type="text" name="no_hp" value="<?=$this->session->userdata('no_hp')?>">
					</div>
					<div class="form-group">
						<label>Gender</label>
						<select class="form-control" name="gender">
						<?php if($user['gender']=='L'):?>
							<option value="L" selected>Laki-laki</option>
							<option value="P">Perempuan</option>
						<?php else :?>
							<option value="L">Laki-laki</option>
							<option value="P" selected="">Perempuan</option>
						<?php endif?>
						</select>		
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control" type="date" name="tgl_lahir" value="<?=$this->session->userdata('tgl_lahir')?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" ><?=$this->session->userdata('alamat')?></textarea>
					</div>
					<div class="form-group">
						<label>Tempat lahir</label>
						<input class="form-control" type="text" name="tmpt_lahir" value="<?=$this->session->userdata('tmpt_lahir')?>">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal" type="button">Kembali</button>
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal Edit User -->
	<!-- Modal edit Password -->
	<div class="modal fade" id="myModalEditPassword<?=$this->session->userdata('id_user')?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" style="text-transform: uppercase;">Edit Password</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<form action="<?php echo site_url('pemilik/editpassword'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Ubah Password</label>
						<input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
						<input class="form-control" type="text"  name="password" required>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal" type="button">Kembali</button>
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End modal edit password-->
<?php $this->load->view('template/footer');?>

