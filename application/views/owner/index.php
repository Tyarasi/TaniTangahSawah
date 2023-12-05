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
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Detail Profile</b></div>
                                <tbody>
                                    <?php foreach ($data_owner as $owner) : ?>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama_toko"><b>Nama Toko</b></label>
                                                    <input type="text" name="nama_toko" autocomplete="off" class="form-control" value="<?= $owner->nama_toko ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alamat"><b>Alamat Toko</b></label>
                                                    <input type="text" name="alamat" autocomplete="off" class="form-control" value="<?= $owner->alamat ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="no_hp"><b>Nomor Handphone</b></label>
                                                    <input type="tel" name="no_hp" autocomplete="off" class="form-control" value="<?= $owner->no_hp ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nama_pemilik"><b>Nama Pemilik Toko</b></label>
                                                    <input type="text" name="nama_pemilik" autocomplete="off" class="form-control" value="<?= $owner->nama_pemilik ?>" readonly>
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="username"><b>Username</b></label>
                                                    <input type="text" name="username" autocomplete="off" class="form-control" value="<?= $owner->username ?>" readonly>
                                                </div>

                                            </div>

                                            <a href="<?= base_url('owner/update/' . $owner->pemilik_id) ?>" class="btn btn-success btn-sm">Ubah Profile</a>
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