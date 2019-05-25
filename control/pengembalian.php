<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 4/3/2019
 * Time: 5:26 PM
 */

include_once '../config/koneksi.php';
$response = array();

if (isset($_POST['kode_pinjam'])){
    $kode = $_POST['kode_pinjam'];
    $status = $_POST['status'];
    $query = "UPDATE peminjaman SET status = '$status' WHERE kode_pinjam = '$kode'";
    $exequery = mysqli_query($koneksi, $query);
} else {
    $response['message'] = "Seluruh kolom harus di isi";
}

echo json_encode($response);