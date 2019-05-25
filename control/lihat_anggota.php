<?php
include_once '../config/koneksi.php';

$response = array();

$select_query_anggota = "SELECT * FROM anggota";
$exequery_anggota = mysqli_query($koneksi, $select_query_anggota);
$num_row_anggota = mysqli_num_rows($exequery_anggota);

if ($num_row_anggota > 0) {
	while ($row_anggota = mysqli_fetch_assoc($exequery_anggota)) {
		$response[] = $row_anggota;
	}
}

echo json_encode(array("anggota"=>$response));