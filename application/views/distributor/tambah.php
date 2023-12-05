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
    <?php $this->load->view('bagian/head.php') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('bagian/samping.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" data-url="<?= base_url('distributor') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Tambah Data Distributor</h1>
                        </div>

                        <div class="float-right">
                            <!-- &ensp spasi dua kali, &nbsp; sekali spasi -->
                            <a href="<?= base_url('distributor') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i>&ensp;Kembali</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header"><b>Silakan isi data dibawah ini!</b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('distributor/tambah_data') ?>" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="kode_distributor"><b>Kode Distributor</b></label>
                                                <input type="text" name="kode_distributor" placeholder="Masukkan Kode Distributor" autocomplete="off" class="form-control" required value="DIST<?= mt_rand(1, 500) ?>" maxlength="3" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="nama_distributor"><b>Nama Distributor</b></label>
                                                <input type="text" name="nama_distributor" placeholder="Masukkan Nama Distributor" autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="no_hp"><b>Nomor Handpone</b></label>
                                                <input type="no_hp" name="no_hp" placeholder="Masukkan Nomor Handpone" autocomplete="off" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="alamat"><b>Alamat</b></label>
                                                <textarea name="alamat" id="alamat" style="resize: none;" class="form-control" placeholder="Masukkan Alamat"></textarea>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- load footer -->
        <?php $this->load->view('bagian/bawah.php') ?>
    </div>
    </div>

    <!-- load semua js -->
    <?php $this->load->view('bagian/all_js.php') ?>
</body>


</html>