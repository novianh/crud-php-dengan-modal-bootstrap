<?php

include 'koneksi.php';
// include '/pages/calon-peserta.php';

//get data dari form
$id_siswa = $_POST['id_siswa-edit'];
$nama = $_POST['nama_siswa-edit'];
$jenis_kelamin = $_POST['jenis_kelamin-edit'];
$alamat = $_POST['alamat-edit'];
$agama = $_POST['agama-edit'];
$asal_sekolah = $_POST['sekolah_asal-edit'];



if (isset($_POST['ubah'])) {
    echo $id_siswa;
    mysqli_query(
        $db,
        "UPDATE siswa SET nama_siswa = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', agama = '$agama', sekolah_asal = '$asal_sekolah' WHERE id_siswa = '$id_siswa'"
    );
    echo "<meta http-equiv='refresh' content='0; url=index.php?p=calon-peserta'>";
} else {
    echo "Data gagal di edit";
}
?>