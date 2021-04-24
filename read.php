<?php
$koneksi = mysqli_connect("localhost", "root", "", "registrasi");
$statistik = query("SELECT * FROM registrasi");

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kumpulan Data</title>
  </head>
  <body>
    <h1>Hasil Data</h1>
    <table border = 1 cellpadding = 10 cellspacing = 0>
      <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Komentar</th>
        <th>Waktu</th>
        <th colspan = 2>Tindakan</th>
      </tr>

      <?php $y = 1; ?>
      <?php foreach($statistik as $data) : ?>
      <tr>
        <td><?php echo $y; ?></td>
        <td><?php echo $data["nama"]; ?></td>
        <td><?php echo $data["umur"]; ?></td>
        <td><?php echo $data["email"]; ?></td>
        <td><?php echo $data["jeniskelamin"]; ?></td>
        <td><?php echo $data["agama"]; ?></td>
        <td><?php echo $data["komentar"]; ?></td>
        <td><?php echo $data["submit"]; ?></td>
        <td> <a href="update.php?id=<?php echo $data["id"]; ?>">Ubah</a> </td>
        <td> <a href="delete.php?id=<?php echo $data["id"]; ?>">Hapus</a> </td>
      </tr>
      <?php $y++; ?>
      <?php endforeach; ?>
    </table>
    <br>
    <p>Total Data = <?php echo ($y - 1); ?></p>
    <br>
    <a href="index.php">Isi Data</a>
  </body>
</html>
