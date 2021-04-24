<?php 
$this->load->view('template/header');
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if($this->session->flashdata('info')){ ?> 
	        <div class="alert alert-primary">
	        <?php echo $this->session->flashdata('info') ?>
	        </div>
	        <?php } ?>
		</div>

		<div class="col-md-6 p-3">
			<h4>Data User Pencari Kos :</h4>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th></th>
				</tr>
				<?php
					$no 	= 1;
					foreach($userpencari->result_object() as $upen){
				?>
				<tr>
					<td><?=$no++;?>.</td>
					<td><?=$upen->nama?></td>
					<td><?=$upen->email?></td>
					<td>
						<a href="hapususer/<?=$upen->id_user?>"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php }?>
			</table>
		</div>
		<div class="col-md-6 p-3">
			<h4>Data User Pemilik Kos :</h4>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th></th>
				</tr>
				<?php
				$no=1;
				foreach($userpemilik->result_object() as $upem){
				?>
				<tr>
					<td><?=$no++;?>.</td>
					<td><?=$upem->nama?></td>
					<td><?=$upem->email?></td>
					<td><a href="hapususer/<?=$upem->id_user?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php }?>
			</table>
		</div>
	</div>
	
	
</div>
<?php $this->load->view('template/footer')?>