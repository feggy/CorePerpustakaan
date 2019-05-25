<?php
define('hostname', 'localhost');
define('username', 'root');
define('password', '');
define('database', 'perpustakaan');

$koneksi = new mysqli(hostname, username, password, database) or die(mysqli_errno($koneksi));

if (mysqli_connect_errno()) {
	$response['message'] = 'gagal terhubung ke database';
    echo json_encode($response);
}
