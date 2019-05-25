<?php
include_once '../config/koneksi.php';

$response = array();

if (isset($_POST['id_anggota']) and
	isset($_POST['nama']) and
	isset($_POST['no_hp']) and
	isset($_POST['alamat']) and
	isset($_POST['awal_pakai']) and
	isset($_POST['akhir_pakai'])) {

	$id = $_POST['id_anggota'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$awal_pakai = $_POST['awal_pakai'];
	$akhir_pakai = $_POST['akhir_pakai'];

	if (isset($_POST['image'])) {
		$foto = date("YmdHis").rand();
		$image = $_POST['image'];
		$upload_path = "../uploads/$foto.jpg";
		file_put_contents($upload_path, base64_decode($image));
	} else {
		$foto = "";
	}

	$query_insert = "INSERT INTO anggota(id_anggota, nama, no_hp, alamat, tgl_on_kartu, tgl_off_kartu, foto) VALUES('$id', '$nama', '$no_hp', '$alamat', '$awal_pakai', '$akhir_pakai', '$foto')";
	$exequery = mysqli_query($koneksi, $query_insert);

	if ($exequery) {
		$response['message'] = 'Anggota berhasil ditambah';
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
