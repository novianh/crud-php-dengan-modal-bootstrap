<?php

include 'koneksi.php';

$nama = $_POST['nama_siswa'];
$jeniskelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$sekolahasal = $_POST['sekolah_asal'];

if (isset($_POST['simpan'])) {
    $sql = "INSERT INTO siswa
            VALUES (DEFAULT, '$nama','$alamat','$jeniskelamin','$agama','$sekolahasal')";

    $query = mysqli_query($db, $sql);

    echo "<meta http-equiv='refresh' content='0; url=index.php?p=setelah-daftar'>";

} else {
    header("location: index.php?p=beranda");
}
?>