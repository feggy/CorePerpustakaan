<?php
include_once '../config/koneksi.php';

$response = array();

$select_query = "SELECT * FROM peminjaman";
        $exequery = mysqli_query($koneksi, $select_query);
        $num_rows = mysqli_num_rows($exequery);

        if($num_rows > 0) {
            while($row = mysqli_fetch_assoc($exequery)){
                $response[] = $row;
            }
        }

echo json_encode(array("peminjaman"=>$response));
