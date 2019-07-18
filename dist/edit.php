<?php
	require 'functions.php';
  // Tangkap keyword
	$keyword = $_GET['id'];
  $query = "SELECT * FROM user WHERE id LIKE '%$keyword%'";
  $datas = query($query);
  echo json_encode($datas);
  exit;
 ?>
