<?php
$this->load->view('template/header');
?>
<div class="container">
	<p>	<a class="btn btn-primary" href="" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"></i> Tambah Iklan</a></p>
	<?php if($this->session->flashdata('info')){ ?> 
    <div class="alert alert-primary">
    <?php echo $this->session->flashdata('info') ?>
    </div>
    <?php } ?>
	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Nama Iklan</th>
			<th >Gambar Iklan</th>
			<th>Action</th>
		</tr>
		<?php
		$no=1;
		foreach($dataiklan->result_object() as $di){
		?>
		<tr>
			<td><?=$no++?>.</td>
			<td><?=$di->nama_iklan?></td>
			<td><img style="width: 100%;" src="<?=base_url('assets/')?>img/iklan/<?=$di->gmb_iklan?>"></td>
			<td>
				<a href="hapusiklan/<?=$di->id_iklan?>"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
	<?php }?>
	</table>
	<!-- Modal tambah -->
	<div class="modal fade" id="myModalTambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" style="text-transform: uppercase;">Tambah Data Fasilitas</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<form action="<?=base_url('index.php/admin/tambahiklan')?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Iklan</label>
							<input class="form-control" type="text" name="nama_iklan" required >
						</div>
						<div class="form-group">
							<label>Gambar Iklan</label>
							<input class="form-control" type="file" name="gmb_iklan" required>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal" type="button">Kembali</button>
						<button class="btn btn-primary" type="submit">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal tambah -->
</div>

<?php $this->load->view('template/footer')?>