<?php 
    include('koneksi.php'); 
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD DATA PASIEN BPJS</title>
    <style type="text/css">
        * {
            font-family: "sans-serif";
            background-color: #CEFFE2;
        }
        h1 {
            text-transform: uppercase;
            color: #000000;
            font-size: 40px;
            padding: 10px;
            border-radius: 0.8rem;
            font-weight: bold;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        }
        .base {
            width: 400px;
            height: fit-content;
            padding: 20px;
            margin: 10px auto;
            background-color: #B1FFCE;
            border-radius: 10px;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddeeee; 
            text-align: left;
        }
        label {
            margin-top: 10px;
            display: block;
            float: left;
            color: #426649;
            text-align: left;
            width: 100%;
            font-size: 13px;
            font-weight: bold;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: #426649;
            font-size: 13px;
        }
        select {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: #426649;
            font-size: 13px;
        }
        button {
            background-color: #426649;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 14px;
            border: 0px;
            margin-top: 10px;
            border-radius: 8px;
            cursor: pointer; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <center><h1>Tambah Data</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nomor BPJS</label>
            <input type="number" name="no_BPJS" autofocus="" required="" />
        </div>
        <div>
            <label>NIK</label>
            <input type="number" name="NIK" autofocus="" required="" />
        </div>
        <div>
            <label>Nama</label>
            <input type="text" name="nama" autofocus="" required="" />
        </div>
        <div>
            <label>Umur</label>
            <input type="text" name="umur" />
        </div>
        <div>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
            <option value="Laki-laki" >Laki-laki</option>
            <option value="Perempuan" >Perempuan</option>
            </select>
        </div>
            <label>Foto BPJS</label>
            <input type="file" name="foto_BPJS" required=""/>
        </div>
        <div>
            <button type="submit">Simpan Data</button>
        </div>
    </section>
    </form>
</body>
</html>