<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $nama_db = "CRUD_DATA_PASIEN_BPJS";
    $koneksi = mysqli_connect($host,$user,$pass,$nama_db);
    
    if(!$koneksi){
        die("Koneksi dengan database gagal: ".mysqli_connect_error());
    }

?>