<?php
	$host	=	"localhost";
	$user	=	"root";
	$pass	=	"";
	$db		=	"crud_hero";

	$config	=	mysqli_connect($host, $user, $pass, $db);
	if(!$config) {
		die("Koneksi Gagal : " . mysqli_connect_error());
	}
?>