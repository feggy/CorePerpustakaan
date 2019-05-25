<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 3/27/2019
 * Time: 8:52 AM
 */

include_once '../config/koneksi.php';
$response = array();

if (isset($_POST['kode_buku']) and
    isset($_POST['judul_buku']) and
    isset($_POST['pengarang']) and
    isset($_POST['penerbit'])) {

    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_buku = $_POST['tahun_buku'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $jenis_buku = $_POST['jenis_buku'];
    $lokasi_rak_buku = $_POST['lokasi_rak_buku'];

    if (isset($_POST['image'])) {
        $qrcode = $_POST['qrcode'];
        $image = $_POST['image'];
        $upload_path = "../uploads/$qrcode.jpg";
        file_put_contents($upload_path, base64_decode($image));
    } else {
        $qrcode = "";
    }

    $queryinsert = "INSERT INTO buku(kode_buku, judul_buku, pengarang, penerbit, tahun_buku, jumlah_buku, jenis_buku, lokasi_rak_buku, qrcode) VALUE ('$kode_buku', '$judul_buku', '$pengarang', '$penerbit', '$tahun_buku', '$jumlah_buku', '$jenis_buku', '$lokasi_rak_buku', '$qrcode')";
    $exequery = mysqli_query($koneksi, $queryinsert);

    if ($exequery){
        $response['kode'] = "0";
        $response['message'] = "Buku berhasil di tambahkan";
    } else {
        $response['kode'] = "1";
        $response['message'] = "Gagal menambah data";
    }
} else {
    $response['message'] = "Seluruh kolom harus di isi";
}

echo json_encode($response);