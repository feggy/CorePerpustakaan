<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 3/31/2019
 * Time: 7:27 AM
 */
include_once '../config/koneksi.php';
$response = array();

if (isset($_POST['kode_buku'])){
    $kode_buku = $_POST['kode_buku'];

    $query = "SELECT judul_buku FROM buku WHERE kode_buku = '$kode_buku'";
    $exequery = mysqli_query($koneksi, $query);

    if ($exequery){
        $jb = mysqli_fetch_assoc($exequery);
        $response['kode'] = "0";
        $response['judul_buku'] = $jb['judul_buku'];
    }
}

if (isset($_POST['kode_buku']) and
    isset($_POST['id_anggota']) and
    isset($_POST['kode_pinjam'])) {

    $kode_buku = $_POST['kode_buku'];
    $id_anggota = $_POST['id_anggota'];
    $kode_pinjam = $_POST['kode_pinjam'];

    $tgl_kembali = date("y-m-d", strtotime("+7 days"));

    $query = "INSERT INTO peminjaman(kode_pinjam, id_anggota, kode_buku, tgl_kembali) VALUES('$kode_pinjam', '$id_anggota', '$kode_buku', '$tgl_kembali')";
    $exequery = mysqli_query($koneksi, $query);

    if ($exequery) {
        $response['kode'] = "0";
        $response['message'] = "Data peminjaman berhasil di simpan";
    } else {
        $response['kode'] = "1";
        $response['message'] = "Gagal menyimpan data";
    }
} else {
    $response['message'] = "Seluruh kolom harus di isi";
}
echo json_encode($response);

