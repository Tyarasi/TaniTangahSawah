<?php
// Periksa apakah pengguna sudah login atau belum
if (!$this->session->userdata('login')) {
    // Jika belum login, arahkan kembali ke halaman login
    redirect('login'); // Ganti 'login' dengan URL halaman login sesuai proyek Anda
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('bagian/head.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('bagian/samping.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" data-url="<?= base_url('owner') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php'); ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray">Informasi Profile</h1>
                        </div>
                        <div class="float-right">
                            <!-- &ensp spasi dua kali, &nbsp; sekali spasi -->
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i>&ensp;Kembali</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Detail Profile</b></div>
                                <tbody>
                                    <?php foreach ($data_karyawan as $karyawan) : ?>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama_toko"><b>Kode Karyawan</b></label>
                                                    <input type="text" name="nama_toko" autocomplete="off" class="form-control" value="<?= $karyawan->kode_karyawan ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alamat"><b>Nama Karyawan</b></label>
                                                    <input type="text" name="alamat" autocomplete="off" class="form-control" value="<?= $karyawan->nama_karyawan ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="no_hp"><b>Nomor Handphone</b></label>
                                                    <input type="tel" name="no_hp" autocomplete="off" class="form-control" value="<?= $karyawan->no_hp ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nama_pemilik"><b>Username</b></label>
                                                    <input type="text" name="nama_pemilik" autocomplete="off" class="form-control" value="<?= $karyawan->username ?>" readonly>
                                                </div>

                                            </div>

                                            <a href="<?= base_url('karyawan/ubah_password/' . $karyawan->karyawan_id) ?>" class="btn btn-success btn-sm">Ubah password</a>
                                        </div>
                                    <?php endforeach; ?>

                                </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- load footer -->
            <?php $this->load->view('bagian/bawah.php'); ?>
        </div>
    </div>

    <!-- load semua js -->
    <?php $this->load->view('bagian/all_js.php') ?>
</body>

</html>