<?php
include '../config/koneksi.php';

$response = array();

if (isset($_POST['username']) and
    isset($_POST['password'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query_select = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
    $exequery = mysqli_query($koneksi, $query_select);
    $cek = mysqli_num_rows($exequery);

    if ($cek > 0) {
        $response['message'] = 'Login berhasil';
        $response['kode'] = '1';

        $response['categories'] = array();
        $user = mysqli_fetch_assoc($exequery);
        $response['username'] = $user['username'];
        $response['password'] = $user['password'];
        $response['nama'] = $user['nama'];
        $response['level'] = $user['level'];
        $response['no_hp'] = $user['no_hp'];
        $response['alamat'] = $user['alamat'];
        $response['foto'] = $user['foto'];
    } else {
        $response['message'] = 'username atau password salah';
        $response['kode'] = '0';
    }
} else {
    $response['message'] = 'Seluruh kolom harus di isi';
    $response['kode'] = '0';
}

echo json_encode($response);