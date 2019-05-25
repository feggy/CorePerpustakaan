<?php
/**
 * Created by PhpStorm.
 * User: FEGGY
 * Date: 3/27/2019
 * Time: 5:31 PM
 */

include_once '../config/koneksi.php';

$response = array();

$select_query_buku = "SELECT * FROM buku";
$exequery_buku = mysqli_query($koneksi, $select_query_buku);
$num_row_buku = mysqli_num_rows($exequery_buku);

if ($num_row_buku > 0) {
    while ($row_buku = mysqli_fetch_assoc($exequery_buku)) {
        $response[] = $row_buku;
    }
}

echo json_encode(array("buku"=>$response));