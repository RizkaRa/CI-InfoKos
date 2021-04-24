<?php $this->load->view('template/header') ?>
<div class="container ">
	<div class="">
		<p><a class="btn btn-primary" href="#myModalTambah" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"></i> Tambah Data Fasilitas</a></p>
		<?php if($this->session->flashdata('info')){ ?> 
        <div class="alert alert-primary">
        <?php echo $this->session->flashdata('info') ?>
        </div>
        <?php } ?>
		<table class="table table-striped">
			<tr>
				<th width="10%">No</th>
				<th>Nama</th>
				<th width="20%">Action</th>
			</tr>
			<?php 
				$no=1;
				foreach($dfasilitas->result_object() as $df){
				?>
			<tr>
				<td><?= $no++;?>.</td>
				<td><?= $df->nama_fasilitas?></td>
				<th>
					<a data-target="#myModalEdit<?=$df->id_fasilitas;?>" data-toggle="modal" href=""><i class="fa fa-edit"></i></a>
					<a href="hapusfasilitas/<?=$df->id_fasilitas?>"><i class="fa fa-trash"></i></a>
				</th>
			</tr>
			<?php } ?>
		</table>
	</div>
	<!-- Modal tambah -->
	<div class="modal fade" id="myModalTambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" style="text-transform: uppercase;">Tambah Data Fasilitas</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<?= form_open('admin/simpanfasilitas')?>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Fasilitas</label>
							<input class="form-control" type="text" name="nama_fasilitas" id="nama_fasilitas" required>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal" type="button">Kembali</button>
						<button class="btn btn-primary" type="submit">Tambah</button>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<!-- End Modal tambah -->
	<!-- Modal Edit -->
	<?php
	foreach($dfasilitas->result_object() as $df){
	?>
	<div class="modal fade" id="myModalEdit<?=$df->id_fasilitas?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" style="text-transform: uppercase;">Edit Data Fasilitas</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<form action="<?php echo site_url('Admin/editfasilitas'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Fasilitas</label>
						<input type="hidden"  name="id_fasilitas" value="<?=$df->id_fasilitas?>">
						<input class="form-control" type="text" id="nama_fasilitas"	 name="nama_fasilitas" value="<?=$df->nama_fasilitas?>" required>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal" type="button">Kembali</button>
					<button class="btn btn-primary" type="submit">Edit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php }?>
	
	<!-- ENd Modal Edit-->
</div>
<?php $this->load->view('template/footer') ?>