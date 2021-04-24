<?php
date_default_timezone_set("Asia/Bangkok");
?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "registrasi");
$id = $_GET['id'];
$data = query("SELECT * FROM registrasi WHERE id = $id")[0];

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}

if ( isset($_POST["submit"]) ){
  if (ubah($_POST) > 0){
    echo "<script> alert('Data berhasil diubah'); </script>";
    header('Location: read.php');
  }
  else{
    echo "<script> alert('Data gagal diubah'); </script>";
    header('Location: read.php');
  }
}

function ubah($sambung){
  global $koneksi;

  $id = $sambung['id'];
  $nama = $sambung["nama"];
  $umur = $sambung["umur"];
  $email = $sambung["email"];
  $jeniskelamin = $sambung["jeniskelamin"];
  $agama = $sambung["agama"];
  $komentar = $sambung["komentar"];
  $submit = $sambung["submit"];

  $query = "UPDATE registrasi SET nama = '$nama', umur = '$umur', email = '$email', jeniskelamin = '$jeniskelamin', agama = '$agama', komentar = '$komentar', submit = '$submit' WHERE id = $id";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Ubah Data</h1>
    <form class="" action="" method="post">
      <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
      <label for="">Nama</label>
      <input type="text" name="nama" autocomplete = "off" value = "<?php echo $data['nama']; ?>"> <br>
      <label for="">Umur</label>
      <input type="text" name="umur" autocomplete = "off" value = "<?php echo $data['umur']; ?>"> <br>
      <label for="">Email</label>
      <input type="email" name="email" autocomplete="off" value = "<?php echo $data['email']; ?>"> <br>
      <label for="">Jenis kelamin</label>
      <input type="radio" name="jeniskelamin" value="Pria" <?php if($data["jeniskelamin"] == 'Pria') echo 'checked'; ?> >Pria
      <input type="radio" name="jeniskelamin" value="Wanita" <?php if($data["jeniskelamin"] == 'Wanita') echo 'checked'; ?>>Wanita <br>
      <label for="">Agama</label>
      <select class="" name="agama">
        <option value="Islam" <?php if($data["agama"] == 'Islam') echo 'selected'; ?> >Islam</option>
        <option value="Kristen" <?php if($data["agama"] == 'Kristen') echo 'selected'; ?> >Kristen</option>
        <option value="Buddha" <?php if($data["agama"] == 'Buddha') echo 'selected'; ?> >Buddha</option>
        <option value="Hindu" <?php if($data["agama"] == 'Hindu') echo 'selected'; ?> >Hindu</option>
        <option value="Konghucu" <?php if($data["agama"] == 'Konghucu') echo 'selected'; ?> >Konghucu</option>
      </select> <br>
      <label for="">Komentar</label> <br>
      <textarea name="komentar" rows="8" cols="80"><?php echo $data['komentar']; ?></textarea> <br>
      <button type="submit" name="submit" value = <?php echo date("h:i:sa"); ?> >Submit</button>
    </form>

  </body>
</html>
