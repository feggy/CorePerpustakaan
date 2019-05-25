<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 3/26/2019
 * Time: 9:19 AM
 */

include_once '../config/koneksi.php';
$response = array();

if (isset($_POST['id_anggota'])){
    $id_anggota = $_POST['id_anggota'];
    $query = "DELETE FROM anggota WHERE id_anggota = '$id_anggota'";
    $exequery = mysqli_query($koneksi, $query);

    $foto = $_POST['foto'];
    if (file_exists("../uploads/$foto.jpg")) {
        unlink("../uploads/$foto.jpg");
    }

    if ($exequery){
        $response['kode'] = "0";
        $response['message'] = "Data anggota berhasil di hapus";
    } else {
        $response['kode'] = '1';
        $response['message'] = "Gagal menghapus data";
    }
} else {
    $response['message'] = "Seluruh kolom harus di isi";
}

echo json_encode($response);