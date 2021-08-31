<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSGA web pmb</title>
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body class="bg-light">
    <!-- awal navbar -->
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">DIGITAL SCHOOL</span>
            </a>

            <ul class="nav">
                <li class="nav-item"><a href="index.php?p=beranda" class="nav-link active" aria-current="page">Halaman Utama</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" aria-current="page" href="index.php?p=calon-peserta" class="nav-link">Peserta</a></li>
                <li class="nav-item"><a data-bs-toggle="modal" data-bs-target="#tambahuser" style="cursor:pointer" class="nav-link">Daftar</a></li>
                <li class="nav-item"><a href="index.php?p=faqs" class="nav-link">FAQs</a></li>
                <li class="nav-item"><a href="index.php?p=tentang" class="nav-link">Tentang</a></li>
            </ul>
        </header>
    </div>

    <!-- modal tambah data -->
    <div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- .................. -->
                    <div class="container">
                        <form class="row g-3" id="form" action="proses-tambah-peserta.php" method="POST">
                            <div class="mt-5 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama_siswa">
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select id="inputState" class="form-select" name="jenis_kelamin">
                                        <option selected>Pilih...</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <select id="inputState2" class="form-select" name="agama">
                                        <option selected>Pilih...</option>
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
                                    <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal">
                                </div>
                            </div>

                            <div class="mt-3 row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary position-relative" name="simpan" id="btn-simpan">Simpan</button>

                                    <button type="reset" class="btn btn-info position-relative">Reset</button>

                                    <button type="button" class="btn btn-success position-relative" data-bs-dismiss="modal" aria-label="Close">Kembali</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    $pages_dir = 'pages';
    if (!empty($_GET['p'])) {
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]);
        $p = $_GET['p'];
        if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
        } else {
            include 'error/404.php';
        }
    } else {
        include($pages_dir . '/beranda.php');
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>