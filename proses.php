<?php
$koneksi = mysqli_connect("localhost", "root", "", "registrasi");

$nama = $_POST['nama'];
$umur = $_POST['umur'];
$email = $_POST['email'];
$jeniskelamin = $_POST['jeniskelamin'];
$agama = $_POST['agama'];
$komentar = $_POST['komentar'];
$submit = $_POST['submit'];

$query = "INSERT INTO registrasi VALUES('$nama','$umur','$email','$jeniskelamin','$agama','$komentar','$submit', '')";

mysqli_query($koneksi, $query);

if (isset($_POST["submit"])){
  header('Location: read.php');
  exit;
}
?>
