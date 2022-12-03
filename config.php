<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "pab_organisasi";

$conn= mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('Koneksi ke database gagal!');

function tampil($query)
{
  $conn = koneksi();

  //query isi tabel
  $result = mysqli_query($conn, $query);

  //jika hasilnya hanya 1 data (digunakan pada detail)
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
?>


