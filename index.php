<?php include("koneksi.php"); ?>
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

        table {
            border: solid 3px #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 93%;
            margin: 10px auto 10px auto;
            border-radius: 0.3rem;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        }

        table thead th {
            background-color: #426649;
            border: 4px solid #ddeeee;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
        }

        table tbody td {
            border: 4px solid #ddeeee;
            color: #000000;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            background-color: #B1FFCE;
        }

        a {
            background-color: #426649;
            color: #fff;
            padding: 10px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: bold;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <center><h1>DATA PASIEN BPJS</h1></center>
    <center><a href="tambah_data.php">+&nbsp;Tambah Data</a></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor BPJS</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Foto BPJS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM data_pasien ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $no; ?></td>                
                <td><?php echo $row['no_BPJS']; ?> </td>
                <td><?php echo $row['NIK']; ?> </td>
                <td><?php echo $row['nama']; ?> </td>
                <td><?php echo $row['umur']; ?> </td>
                <td><?php echo $row['jenis_kelamin']; ?> </td>
                <td><img style="width: 80px;" src="gambar/<?php echo $row['foto_BPJS']; ?>"></td>
                <td>
                    <a href="edit_data.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>