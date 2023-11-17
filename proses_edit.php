<?php
    include 'koneksi.php';

    $id             = $_POST['id'];
    $no_BPJS        = $_POST['no_BPJS'];
    $NIK            = $_POST['NIK'];
    $nama           = $_POST['nama'];
    $umur           = $_POST['umur'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $foto_BPJS      = $_FILES['foto_BPJS']['name'];

    if($foto_BPJS != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $foto_BPJS);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_BPJS']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$foto_BPJS;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

            $query  = "UPDATE data_pasien SET no_BPJS = '$no_BPJS', NIK = '$NIK', nama = '$nama', umur = '$umur', jenis_kelamin = '$jenis_kelamin', foto_BPJS = '$nama_gambar_baru'";
            $query .= " WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else {
                echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi gambar yang boleh hanya png dan jpg.');window.location='tambah_data.php';</script>";
        exit;
        }
    } else {
        $query  = "UPDATE data_pasien SET no_BPJS = '$no_BPJS', NIK = '$NIK', nama = '$nama', umur = '$umur', jenis_kelamin = '$jenis_kelamin'";
        $query .= " WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    }
?>