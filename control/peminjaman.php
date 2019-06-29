<?php
include_once '../config/koneksi.php';
$response = array();

$start = date("2018-m-d");
$end = date("Y-m-d");

if (isset($_POST['start']) and isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
}

$query = "SELECT peminjaman.*, anggota.nama, buku.judul_buku FROM peminjaman, anggota, buku WHERE peminjaman.id_anggota = anggota.id_anggota AND buku.kode_buku = peminjaman.kode_buku AND DATE(peminjaman.tgl_pinjam) BETWEEN '$start' AND '$end' ORDER BY peminjaman.tgl_pinjam DESC";
$exequery = mysqli_query($koneksi, $query);
$numrows = mysqli_num_rows($exequery);

if ($numrows > 0){
    while ($row_peminjaman = mysqli_fetch_assoc($exequery)){
        $response[] = $row_peminjaman;
    }
}

echo json_encode(array("peminjaman"=>$response));