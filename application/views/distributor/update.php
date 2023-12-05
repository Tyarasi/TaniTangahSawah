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
                            <h1 class="h3 m-0 text-gray-800">Ubah Data Distributor</h1>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header"><b>Silakan ubah data dibawah ini! </b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('distributor/update_data/' . $distributor->kode_distributor)  ?>" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="kode_distributor"><b>Kode Distributor</b></label>
                                                <input type="text" name="kode_distributor" placeholder="Masukkan Kode Distributor" autocomplete="off" class="form-control" required value="<?= $distributor->kode_distributor ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nama_distributor"><b>Nama Distributor</b></label>
                                                <input type="text" name="nama_distributor" placeholder="Masukkan Nama Distributor" autocomplete="off" class="form-control" required value="<?= $distributor->nama_distributor ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="no_hp"><b>Nomor Handpone</b></label>
                                                <input type="no_hp" name="no_hp" placeholder="Masukkan Nomor Handpone" autocomplete="off" class="form-control" required value="<?= $distributor->no_hp ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="alamat"><b>Alamat</b></label>
                                                <input name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required value="<?= $distributor->alamat ?>">
                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="<?= base_url('distributor') ?>" class="btn btn-danger">Batal</a>
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