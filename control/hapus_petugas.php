<?php
include_once '../config/koneksi.php';

$response = array();

$username = $_POST['username'];
$foto = $_POST['foto'];

$query_delete = "DELETE FROM pengguna WHERE username = '$username'";
$exequery = mysqli_query($koneksi, $query_delete);

if (file_exists("../uploads/$foto.jpg")) {
	unlink("../uploads/$foto.jpg");
}

if ($exequery) {
	$response['message'] = 'Petugas berhasil dihapus';
	$response['kode'] = '1';
} else {
	$response['message'] = 'Gagal menghapus petugas';
	$response['kode'] = '0';
}

echo json_encode($response);