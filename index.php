<?php
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Register</title>
  </head>
  <body>
    <h1>Isi Data</h1>
    <form class="" action="proses.php" method="post">
      <label for="">Nama</label>
      <input type="text" name="nama" autocomplete = "off"> <br>
      <label for="">Umur</label>
      <input type="text" name="umur" autocomplete = "off"> <br>
      <label for="">Email</label>
      <input type="email" name="email" autocomplete="off"> <br>
      <label for="">Jenis kelamin</label>
      <input type="radio" name="jeniskelamin" value="Pria">Pria
      <input type="radio" name="jeniskelamin" value="Wanita">Wanita <br>
      <label for="">Agama</label>
      <select class="" name="agama">
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Buddha">Buddha</option>
        <option value="Hindu">Hindu</option>
        <option value="Konghucu">Konghucu</option>
      </select> <br>
      <label for="">Komentar</label> <br>
      <textarea name="komentar" rows="8" cols="80"></textarea> <br>
      <button type="submit" name="submit" value = <?php echo date("h:i:sa"); ?> >Submit</button>
    </form>
    <br>
    <a href="read.php">Lihat hasil data</a>
  </body>
</html>
