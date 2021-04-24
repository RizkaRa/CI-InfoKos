<?php
$this->load->view('template/header');
?>
<div class="container">
	<div class="container text-center">
		<h2>DATA PEMESAAN</h2>
	</div>
	<?php if($this->session->flashdata('info')){ ?> 
    <div class="alert alert-primary">
    <?php echo $this->session->flashdata('info') ?>
    </div>
    <?php } ?>
	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Nama Pemesan</th>
			<th>No Hp / WA</th>
			<th>Waktu Pesan</th>
			<th>Comment</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($dpesanan->result_object() as $dp){
		?>
		<tr>
			<td><?=$no++?>.</td>
			<td><?=$dp->namapemesan?></td>
			<td><?=$dp->no_hp?></td>
			<td><?=$dp->waktu?></td>
			<td><?=$dp->comment?></td>
			<td>
				<a href="<?= base_url('index.php/pemilik/hapuspesanan')?>/<?=$dp->id_order?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php }?>

	</table>
</div>
<?php $this->load->view('template/footer');?>
