<?php 
	include 'connection.php';

	$id_type = $_GET['id_type'];

	$delete = mysqli_query($config, "DELETE FROM type_tb WHERE id_type='$id_type'");
	if($delete) {
		header('Location: type.php?status=sukses');
	} else {
		header('Location: type.php?status=gagal');
	}
?>