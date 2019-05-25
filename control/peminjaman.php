<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 4/2/2019
 * Time: 2:01 PM
 */

include_once '../config/koneksi.php';
$response = array();

$query = "SELECT peminjaman.*, anggota.nama, buku.judul_buku FROM peminjaman, anggota, buku WHERE peminjaman.id_anggota = anggota.id_anggota AND buku.kode_buku = peminjaman.kode_buku ORDER BY peminjaman.tgl_pinjam DESC";
$exequery = mysqli_query($koneksi, $query);
$numrows = mysqli_num_rows($exequery);

if ($numrows > 0){
    while ($row_peminjaman = mysqli_fetch_assoc($exequery)){
        $response[] = $row_peminjaman;
    }
}

echo json_encode(array("peminjaman"=>$response));