<?php
date_default_timezone_set("Asia/jakarta");
include '../koneksi.php';

$id_kos		= $_POST['id'];
$nama 		= $_POST['nama'];
$no_hp 		= $_POST['no_hp'];
$comment 	= $_POST['comment'];
$date 		= date('Y-m-d H:i:s');

$query = mysqli_query($db, "INSERT INTO data_order (id_kos, namapemesan, no_hp, comment, waktu)
							VALUES ('$id_kos','$nama','$no_hp','$comment','$date')");
if ($query == true){
	echo "<script>alert('berhasil')</script>";
	header('Location: index.php');
}else{
	echo "<script>alert('Gagal')</script>";
	header('Location: index.php');
}