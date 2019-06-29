<?php
include_once '../config/koneksi.php';

$response = array();

if(isset($_POST['kode_pinjam'])){
    $kode_pinjam = $_POST['kode_pinjam'];
    $select_query = "SELECT peminjaman.*, anggota.nama, buku.judul_buku FROM peminjaman, anggota, buku WHERE peminjaman.kode_pinjam = '$kode_pinjam' AND peminjaman.id_anggota = anggota.id_anggota AND buku.kode_buku = peminjaman.kode_buku";
    $exequery = mysqli_query($koneksi, $select_query);
    $num_rows = mysqli_num_rows($exequery);
    if($num_rows > 0) {
        while($row = mysqli_fetch_assoc($exequery)){
            $response[] = $row;
        }
    }
} else {
    $response['error'] = "true";
    $response['kode'] = "101";
    $response['message'] = "Kolom harus di isi";
}

echo json_encode(array("peminjaman"=>$response));
