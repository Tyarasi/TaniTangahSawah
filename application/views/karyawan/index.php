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
            <div id="content" data-url="<?= base_url('karyawan') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-primary-800">Data Karyawan</h1>
                        </div>
                        <div class="float-right">
                            <!-- Jika aksi bisa owner dan karyawan php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : -->
                            <?php if ($this->session->login['status'] == 'owner') : ?>
                                <!-- Success warna hijau , Primary warna biru, danger merah, warning kuning
                            secondary abu-abu, info tosca, light putih, dark hitam -->
                                <a href="<?= base_url('karyawan/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                            <?php endif ?>
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
                    <!-- mb-4 menambah margin dibawah -->
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>Daftar karyawan</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode karyawan</td>
                                            <td>Nama karyawan</td>
                                            <td>Nomor Handpone</td>
                                            <td>Username</td>
                                            <td>Password</td>
                                            <!-- Jika aksi bisa owner dan karyawan php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : -->
                                            <?php if ($this->session->login['status'] == 'owner') : ?>
                                                <td>Aksi</td>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data_karyawan as $karyawan) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $karyawan->kode_karyawan ?></td>
                                                <td><?= $karyawan->nama_karyawan ?></td>
                                                <td><?= $karyawan->no_hp ?></td>
                                                <td><?= $karyawan->username ?></td>
                                                <td><?= $karyawan->password ?></td>
                                                <!-- Jika aksi bisa owner dan karyawan php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : -->
                                                <?php if ($this->session->login['status'] == 'owner') : ?>
                                                    <td>
                                                        <a href="<?= base_url('karyawan/update/' . $karyawan->karyawan_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('karyawan/hapus/' . $karyawan->karyawan_id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                <?php endif ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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