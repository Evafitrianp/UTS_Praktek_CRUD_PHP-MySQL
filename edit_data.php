<?php include 'koneksi.php';

  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM data_pasien WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data .');window.location='index.php';</script>";
  }         
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <center><h1>Edit Data</h1></center>
    <center><h2><?php echo $data['nama']; ?></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
            <label>Nomor BPJS</label>
            <input type="number" name="no_BPJS" required="" value="<?php echo $data['no_BPJS']; ?>"/>
        </div>
        <div>
            <label>NIK</label>
            <input type="number" name="NIK" required="" value="<?php echo $data['NIK']; ?>" />
        </div>
        <div>
            <label>Nama</label>
            <input type="text" name="nama" autofocus="" required="" value="<?php echo $data['nama']; ?>" />
        </div>
        <div>
            <label>Umur</label>
            <input type="text" name="umur" required="" value="<?php echo $data['umur']; ?>" />
        </div>
        <div>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
            <option value="">--Jenis Kelamin--</option>
            <option value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
            </select>
        </div>
        <div>
            <label>Foto</label>
            <img src="gambar/<?php echo $data['foto_BPJS']; ?>" style="width: 100px; float: left; margin-bottom: 5px;">
            <input type="file" name="foto_BPJS"/>
        </div>
        <div>
            <br>
            <button type="submit">Simpan Perubahan</button>
        </div>
    </section>
    </form>
</body>
</html>