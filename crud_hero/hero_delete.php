<?php 
	include 'connection.php';

	$id_hero = $_GET['id_hero'];

	$query = mysqli_query($config, "SELECT * FROM hero_tb WHERE id_hero='$id_hero'");
	$delete = mysqli_fetch_array($query);
	$photo = 'img/'.$delete['photo'];

	unlink($photo);
	$delete = mysqli_query($config, "DELETE FROM hero_tb WHERE id_hero='$id_hero'");

	if($delete) {
		header('Location: hero.php?status=sukses');
	} else {
		header('Location: hero.php?status=gagal');
	}
?>