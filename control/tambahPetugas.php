<?php
include_once '../config/koneksi.php';

$response = array();

if (isset($_POST['username']) and
	isset($_POST['password']) and
	isset($_POST['nama']) and
	isset($_POST['level']) and
	isset($_POST['no_hp']) and
	isset($_POST['alamat'])) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];

	if (isset($_POST['image'])) {
		$foto = date("YmdHis").rand();
		$image = $_POST['image'];
		$upload_path = "../uploads/$foto.jpg";
		file_put_contents($upload_path, base64_decode($image));
	} else {
		$foto = "";
	}

	$query_insert = "INSERT INTO pengguna(username, password, nama, level, no_hp, alamat, foto) VALUES('$username', '$password', '$nama', '$level', '$no_hp', '$alamat', '$foto')";
	$exequery = mysqli_query($koneksi, $query_insert);

	if ($exequery) {
		$response['message'] = 'Petugas berhasil ditambah';
		$response['kode'] = '1';
	} else {
		$response['message'] = 'Gagal menambah petugas';
		$response['kode'] = '0';
	}
} else {
	$response['message'] = 'Seluruh Kolom harus di isi';
	$response['kode'] = '0';
}


echo json_encode($response);
