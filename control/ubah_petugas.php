<?php
include_once '../config/koneksi.php';

$response = array();

$username = $_POST['username'];
$usernamelama = $_POST['usernamelama'];
$nama = $_POST['nama'];
$level = $_POST['level'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];

if (isset($_POST['image'])) {
	if (file_exists("../uploads/$foto.jpg")) {
		unlink("../uploads/$foto.jpg");
	} else {
		$foto = date("YmdHis").rand();
	}
	$image = $_POST['image'];
	$upload_path = "../uploads/$foto.jpg";
	file_put_contents($upload_path, base64_decode($image));
}

if ($_POST['password'] == "") {
    $query_update = "UPDATE pengguna SET username = '$username', nama = '$nama', level = '$level', no_hp = '$no_hp', alamat = '$alamat', foto = '$foto' WHERE username = '$usernamelama'";
} else {
    $password = md5($_POST['password']);
    $query_update = "UPDATE pengguna SET username = '$username', password = '$password', nama = '$nama', level = '$level', no_hp = '$no_hp', alamat = '$alamat', foto = '$foto' WHERE username = '$usernamelama'";
}

$exequery = mysqli_query($koneksi, $query_update);

if ($exequery) {
	$response['message'] = 'Data petugas berhasil diubah';
	$response['kode'] = '1';
} else{
	$response['message'] = 'Gagal mengubah data';
	$response['kode'] = '0';
}

echo json_encode($response);