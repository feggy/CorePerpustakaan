<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 3/24/2019
 * Time: 11:58 AM
 */

include_once '../config/koneksi.php';

$response = array();

$id = $_POST['id'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$tgl_on_kartu = $_POST['tgl_on_kartu'];
$tgl_off_kartu = $_POST['tgl_off_kartu'];
$foto = $_POST['foto'];

if (isset($_POST['image'])){
    if (file_exists("../uploads/$foto.jpg")){
        unlink("../uploads/$foto.jpg");
    } else {
        $foto = date("YmdHis").rand();
    }
    $image = $_POST['image'];
    $upload_path = "../uploads/$foto.jpg";
    file_put_contents($upload_path, base64_decode($image));
}

$query_update = "UPDATE anggota SET nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', tgl_on_kartu = '$tgl_on_kartu', tgl_off_kartu = '$tgl_off_kartu', foto = '$foto' WHERE id_anggota =  '$id'";
$exequery = mysqli_query($koneksi, $query_update);

if ($exequery){
    $response['message'] = 'Data anggota berhasil di ubah';
    $response['kode'] = '0';
} else {
    $response['message'] = 'Gagal mengubah data';
    $response['kode'] = '1';
}

echo json_encode($response);