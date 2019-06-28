<?php
include_once '../config/koneksi.php';

$response = array();

if( isset($_POST['start']) AND
    isset($_POST['end'])) {

        $start = $_POST['start'];
        $end = $_POST['end'];

        $select_query = "SELECT * FROM peminjaman WHERE DATE(tgl_pinjam) BETWEEN '$start' AND '$end'";
        $exequery = mysqli_query($koneksi, $select_query);
        $num_rows = mysqli_num_rows($exequery);

        if($num_rows > 0) {
            while($row = mysqli_fetch_assoc($exequery)){
                $response[] = $row;
            }
        }
} else {
    $response['error'] = "true";
    $response['message'] = "Seluruh kolom harus di isi";
}

echo json_encode(array("transaksi"=>$response));
