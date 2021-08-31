<?php

include '../koneksi.php';
// menangkap data id yang di kirim dari url
$id = $_GET['id_siswa'];
// menghapus data dari database
mysqli_query($db, "delete from siswa where id_siswa='$id'");

// mengalihkan halaman kembali ke index.php
header("location:../index.php?p=calon-peserta"); ?>