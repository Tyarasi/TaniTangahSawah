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
            <div id="content" data-url="<?= base_url('pembelian') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php'); ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Data Pembelian Barang</h1>
                        </div>
                        <div class="float-right">
                            <!-- Jika aksi bisa owner dan karyawan php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : -->
                            <?php if ($this->session->login['status'] == 'karyawan') : ?>
                            <a href="<?= base_url('pembelian/tambah') ?>" class="btn btn-primary btn-sm"><i
                                    class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                            <?php endif; ?>
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
                    <?php endif; ?>
                    <div class="card shadow">
                        <div class="card-header"><strong>Daftar Pembelian Barang</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi Pembelian</th>
                                            <th>Nama Supplier</th>
                                            <th>Jam Pembelian</th>
                                            <th>Tanggal Pembelian</th>
                                            <?php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : ?>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Nama Satuan</th>
                                            <th>Harga Beli</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data_pembelian as $pembelian) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pembelian->kode_pembelian ?></td>
                                            <td><?= $pembelian->nama_distributor ?></td>
                                            <td><?= $pembelian->jam_pembelian ?></td>
                                            <td><?= date('d M Y', strtotime($pembelian->tanggal_pembelian)); ?></td>
                                            <td>
                                                <?= $pembelian->nama_barang?>
                                            </td>
                                            <td> <?= $pembelian->jumlah_barang?></td>
                                            <td> <?= $pembelian->nama_satuan?></td>
                                            <td> <?= $pembelian->harga_beli?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- load footer -->
            <?php $this->load->view('bagian/bawah.php'); ?>
        </div>
    </div>
    <?php $this->load->view('bagian/all_js.php'); ?>
</body>

</html>