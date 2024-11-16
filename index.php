<?php

    require_once('koneksi.php');
    $sql = "SELECT * FROM sekolah"
    $result = $conn->query($sql);

    $sekolah = $result=->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekolah</title>
    <style>
    /* Style untuk halaman dan header */
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    }

    th, td {
    padding: 12px;
    text-align:center;
    border-bottom: 1px solid #e0e0e0;
    } 

    th {
    color: lightskyblue;
    font-weight: bold;
    text-transform: uppercase;
    background-color: #f4f4f4;
  }

  /* Input filter dalam kolom header */
  th input[type="text"], th select {
  width: 90%;
  padding: 5px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
  text-align: center;
  font-size: 14px;
  margin-top: 5px; /* Jarak atas untuk input */
  }

  /* Warna dan gaya untuk badge status */
  .badge {
  padding: 5px 10px;
  border-radius: 12px;
  color: #fff;
  font-size: 12px;
  display: inline-block;
  font-weight: bold;
  }

  .badge.negeri {
  background-color: #4CAF50; /* Hijau untuk Negeri */
  }

  .badge.swasta {
  background-color: #FF5722; /* Oranye untuk Swasta */
  }
  .badge.ikut {
  background-color: #4CAF50; /* Hijau untuk Ikut PPDB */
  }

  .badge.tidak-ikut {
  background-color: #FF5722; /* Oranye untuk Tidak Ikut */
  }

  /* Hover effect untuk baris */
  tr:hover {
  background-color: #f1f1f1;
  }

  /* Menambah border pada bagian bawah tabel */
  table tr:last-child td {
  border-bottom: none;
  }
  </style>
</head>
<body>
    <h1>Daftar Sekolah</h1>
    <table >
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama Sekolah</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Status Sekolah</th>
                <th>Ikut PPDB</th>
                <th>Profil</th>
            </tr>
            <?php
                 foreach ($sekolah as $key=> $row) {
                // Menentukan kelas badge berdasarkan status sekolah dan ikut PPDB
                $statusBadge = $row['status_sekolah'] == 'Negeri' ? 'badge negeri': 'badge swasta';
                $ppdbBadge = $row['ikut_ppdb'] == 'Ya'? 'badge ikut': 'badge tidak-ikut';
            ?>
            <tr>
                <td><?php echo $key +1; ?></td>
                <td><?php echo $row ['kode'] ?></td>
                <td><?php echo $row ['nama_sekolah'] ?></td>
                <td><?php echo $row ['kelurahan'] ?></td>
                <td><?php echo $row ['kecamatan'] ?></td>
                <td><?php echo $row ['status_sekolah'] ?></td>
                <td><?php echo $row ['ikut_ppdb'] ?></td>
                </tr>
            <?php } ?>
        </table>
</body>
</html>