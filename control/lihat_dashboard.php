<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 07-Apr-19
 * Time: 5:44 PM
 */
include_once '../config/koneksi.php';
$response = array();

function selectall($table){
    $select = "SELECT * FROM $table";
    return $select;
}

function selectallpeminjaman($kondisi){
    $select = "SELECT * FROM peminjaman WHERE status = '$kondisi'";
    return $select;
}


$exequery_anggota = mysqli_query($koneksi, selectall("anggota"));
$num_rows_anggota = mysqli_num_rows($exequery_anggota);

$exequery_buku = mysqli_query($koneksi, selectall("buku"));
$num_rows_buku = mysqli_num_rows($exequery_buku);

$exequery_sedangpinjam = mysqli_query($koneksi, selectallpeminjaman("Sedang dipinjam"));
$num_rows_sedangpinjam = mysqli_num_rows($exequery_sedangpinjam);

$exequery_sudahdikembalian = mysqli_query($koneksi, selectallpeminjaman("Sudah dikembalikan"));
$num_rows_sudahdikembalian = mysqli_num_rows($exequery_sudahdikembalian);

$response['anggota'] = $num_rows_anggota;
$response['buku'] = $num_rows_buku;
$response['sedangdipinjam'] = $num_rows_sedangpinjam;
$response['sudahdikembalikan'] = $num_rows_sudahdikembalian;

echo json_encode($response);