<?php
$this->load->view('template/header');
?>

<div class="p-2">
	<a class="btn btn-success" href="formkos" ><i class="fa fa-plus"></i> Tambah Data Kos</a>
</div>
<?php if($this->session->flashdata('info')){ ?> 
<div class="alert alert-primary">
<?php echo $this->session->flashdata('info') ?>
</div>
<?php } ?>
<div class="p-2" id="data-kos">
	<table class="table-striped table">
	<tr align="center">
		<th width="10px">No </th>
		<th width="50px">Foto</th>
		<th width="20%">Nama Kos</th>
		<th width="15%">Untuk</th>
		<th width="30%">Alamat</th>
		<th width="20%">Fasilitas</th>
		<th width="5%">Jumlah Kamar</th>
		<th width="20%">Action</th>
	</tr>
	<?php
	$no=1;
	foreach ($datakos->result_object() as $dk){
	?>
	<tr>
		<td><?=$no++;?>.</td>
		<td><img src="<?=base_url('assets/')?>img/kos/<?=$dk->gmb_kos?>"></td>
		<td><?=$dk->nama_kos?></td>
		<td><?=$dk->untuk?></td>
		<td><?=$dk->alamat_kos?></td>
		<td><?=$dk->fasilitas?></td>
		<td align="center"><?=$dk->jml_kamar?></td>
		<td class="p-2">
			<a class="btn btn-primary btn-sm"  href="formeditkos/<?=$dk->id_kos;?>" title="Edit"><i class="fa fa-edit"></i></a>
			<a class="btn btn-danger btn-sm" href="hapusdatakos/<?=$dk->id_kos;?>" title="Hapus"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php }?>
</table>	
</div>

<?php $this->load->view('template/footer'); ?>