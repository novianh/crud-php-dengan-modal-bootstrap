<?
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calon Peserta</title>
</head>

<body>
    <!-- tabel tampil -->
    <div class="container">
        <h5 class="text-center mt-5">Pendaftar</h5><br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="text-center table-dark">

                    <th id="label-tampil-no">No</th>
                    <th>Id Siswa</th>
                    <th>Nama Peserta</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            $query = mysqli_query($db, 'SELECT * FROM siswa');
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr class="text-center">
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['id_siswa'] ?></td>
                    <td><?php echo $data['nama_siswa'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['jenis_kelamin'] ?></td>
                    <td><?php echo $data['agama'] ?></td>
                    <td><?php echo $data['sekolah_asal'] ?></td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#edituser" style="text-decoration:none" onclick="setEdit('<?php echo $data['id_siswa'] ?>', '<?php echo $data['nama_siswa'] ?>', '<?php echo $data['jenis_kelamin'] ?>', '<?php echo $data['alamat'] ?>', '<?php echo $data['agama'] ?>', '<?php echo $data['sekolah_asal'] ?>')">
                            <i class=" fas fa-user-edit fa-m m-2 text-primary "></i>
                        </a>
                        <a href="pages/proses_delete.php?id_siswa=<?php echo $data['id_siswa']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="fas fa-user-minus fa-m text-secondary "></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>



    <!-- edit modal -->
    <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Data Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- .................. -->
                    <form class="row g-3" action="proses_edit.php" method="POST">
                        <div class="mt-5 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama-edit" name="nama_siswa-edit">
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select id="jenis_kelamin-edit" class="form-select" name="jenis_kelamin-edit">
                                    <option>Pilih...</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P" selected>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="alamat-edit" name="alamat-edit"><?php echo $data['alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <select id="agama-edit" class="form-select" name="agama-edit">
                                    <option>Pilih...</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <label for="sekolah_asal" class="col-sm-2 col-form-label">Sekolah Asal</label>
                            <div class="col-sm-10">
                                <input value="<?php echo $data['sekolah_asal'] ?>" type="text" class="form-control" id="sekolah_asal-edit" name="sekolah_asal-edit">
                            </div>
                        </div>

                        <div class="mt-3 row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary position-relative" name="ubah" id="btn-simpan" value="Simpan">
                                <input type="text" class="form-control" id="id-edit" name="id_siswa-edit" style="display: none;">
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="https://kit.fontawesome.com/a5fb365c63.js" crossorigin="anonymous"></script>
    <!-- meletakkan data dalam form edit -->
    <script>
        function setEdit(id_siswa, nama_siswa, jenis_kelamin, alamat, agama, sekolah_asal) {
            document.getElementById('id-edit').value = id_siswa
            document.getElementById('nama-edit').value = nama_siswa
            document.getElementById('jenis_kelamin-edit').value = jenis_kelamin
            document.getElementById('alamat-edit').value = alamat
            document.getElementById('agama-edit').value = agama
            document.getElementById('sekolah_asal-edit').value = sekolah_asal
        }
    </script>
</body>

</html>