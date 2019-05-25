<?php

include_once '../config/koneksi.php';

$response_anggota = array();

$select_query_anggota = "SELECT * FROM anggota";
$exequery_anggota = mysqli_query($koneksi, $select_query_anggota);
$num_row_anggota = mysqli_num_rows($exequery_anggota);

if ($num_row_anggota > 0) {
	while ($row_anggota = mysqli_fetch_assoc($exequery_anggota)) {
		$response_anggota[] = $row_anggota;
	}
}

// echo json_encode(array("anggota"=>$response));

$response_buku = array();

$select_query_buku = "SELECT * FROM buku";
$exequery_buku = mysqli_query($koneksi, $select_query_buku);
$num_row_buku = mysqli_num_rows($exequery_buku);

if ($num_row_buku > 0) {
	while ($row_buku = mysqli_fetch_assoc($exequery_buku)) {
		$response_buku[] = $row_buku;
	}
}

$response_peminjaman = array();

$select_query_peminjaman = "SELECT * FROM peminjaman";
$exequery_peminjaman = mysqli_query($koneksi, $select_query_peminjaman);
$num_row_peminjaman = mysqli_num_rows($exequery_peminjaman);

if ($num_row_peminjaman > 0) {
	while ($row_peminjaman = mysqli_fetch_assoc($exequery_peminjaman)) {
		$response_peminjaman[] = $row_peminjaman;
	}
}

$response_pengembalian = array();

$select_query_pengembalian = "SELECT * FROM pengembalian";
$exequery_pengembalian = mysqli_query($koneksi, $select_query_pengembalian);
$num_row_pengembalian = mysqli_num_rows($exequery_pengembalian);

if ($num_row_pengembalian > 0) {
	while ($row_pengembalian = mysqli_fetch_assoc($exequery_pengembalian)) {
		$response_pengembalian[] = $row_pengembalian;
	}
}

$response_pengguna = array();

$select_query_pengguna = "SELECT * FROM pengguna";
$exequery_pengguna = mysqli_query($koneksi, $select_query_pengguna);
$num_row_pengguna = mysqli_num_rows($exequery_pengguna);

if ($num_row_pengguna > 0) {
	while ($row_pengguna = mysqli_fetch_assoc($exequery_pengguna)) {
		$response_pengguna[] = $row_pengguna;
	}
}

echo json_encode(array("anggota"=>$response_anggota));
echo json_encode(array("buku"=>$response_buku));
echo json_encode(array("peminjaman"=>$response_peminjaman));
echo json_encode(array("pengembalian"=>$response_pengembalian));
echo json_encode(array("pengguna"=>$response_pengguna));