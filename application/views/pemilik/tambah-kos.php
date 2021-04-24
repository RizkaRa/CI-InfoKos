<?php $this->load->view('template/header');?>
<div class="container card">
	<?= form_open_multipart('pemilik/simpankos')?>
	<form action="<?=base_url('index.php/pemilik/simpankos')?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>TAMBAH DATA KOS</h2>
				<hr>
			</div>
			<input type="hidden" name="email" value="<?=$_SESSION['email']?>">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama Kos</label>
					<input class="form-control" type="text" name="nama_kos" required>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="form-control" name="deskripsi"></textarea>
				</div>
				<div class="form-group">
					<label>Alamat Kos</label>
					<textarea class="form-control" name="alamat_kos" required></textarea>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Harga/Bulan</label>
							<input class="form-control" type="number" name="harga" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Untuk</label>
							<select class="form-control" name="untuk">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
								<option value="Campur">Campur</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Jml Kamar</label>
							<input class="form-control" type="number" name="jml_kamar" required>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Luas</label>
					<input class="form-control" type="text" name="luas" required>
				</div>
				<div class="form-group">
					<label>Kamar Mandi</label>
					<select class="form-control" name="km">
						<option value="Luar">Luar</option>
						<option value="Dalam">Dalam</option>
					</select>
				</div>
				<div class="form-group">
					<label>Fasiltas Kamar</label>
					<textarea class="form-control" type="text" id="selectedfasilitas" name="data_fasilitas" placeholder="Silahkan Piilih atau inputkan" required></textarea>
					<div class="row">
						<?php foreach($dfasilitas->result_object() as $df){?>
						<div class="col-md-3 col-xs-6">
							<input type="checkbox" class="fasilitas" value="<?=$df->nama_fasilitas?>">
							<label for="checkbox"><?=$df->nama_fasilitas?></label>
						</div>				
						<?php }?>
					</div>
				</div>
				<div class="form-group">
					<label>Gambar Kos</label>
					<input class="form-control" type="file" name="gmb_kos" required>
				</div>
			</div>
			<div class="col-md-12">

				<button class="btn btn-primary" type="submit">Simpan</button>
				<a class="btn btn-danger" href="<?=base_url()?>index.php/pemilik/datakos">Kembali</a>
			</div>
		</div>
	<?= form_close();?>
</div>

<!-- Tampil Fasilitas -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.fasilitas').click(function(){
			var text="";
			$('.fasilitas:checked').each(function(){
				text+=$(this).val()+','+' ';
			});
			text=text.substring(0,text.length-1);
			$('#selectedfasilitas').val(text);
		});
	});
</script>

<?php $this->load->view('template/footer');?>