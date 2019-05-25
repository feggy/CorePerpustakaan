<?php
include_once '../config/koneksi.php';

$response = array();

$select_query_pengguna = "SELECT * FROM pengguna";
$exequery_pengguna = mysqli_query($koneksi, $select_query_pengguna);
$num_row_pengguna = mysqli_num_rows($exequery_pengguna);

if ($num_row_pengguna > 0) {
	while ($row_pengguna = mysqli_fetch_assoc($exequery_pengguna)) {
		$response[] = $row_pengguna;
	}
}

echo json_encode(array("pengguna"=>$response));