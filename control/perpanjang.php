<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 4/3/2019
 * Time: 6:25 PM
 */

include_once '../config/koneksi.php';
$response = array();

if (isset($_POST['kode_pinjam'])){
    $kode = $_POST['kode_pinjam'];
    $tgl = $_POST['tgl_kembali'];
    $newTgl = date('Y-m-d', strtotime('+7 days', strtotime($tgl)));
    $query = "UPDATE peminjaman SET tgl_kembali = '$newTgl' WHERE kode_pinjam = '$kode'";
    $exequery = mysqli_query($koneksi, $query);
} else {
    $response['message'] = "Seluruh kolom harus di isi";
}

echo json_encode($response);