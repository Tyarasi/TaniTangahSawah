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
            <div id="content">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php'); ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray">Detail Transaksi Penjualan</h1>
                        </div>
                        <div class="float-right">
                            <!-- &ensp spasi dua kali, &nbsp; sekali spasi -->
                            <a href="<?= base_url('penjualan') ?>" class="btn btn-secondary btn-sm"><i
                                    class="fa fa-arrow-left"></i>&ensp;Kembali</a>
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

                    <div class="card shadow">
                        <div class="card-header"><b>Detail Transaksi - <?= $penjualan->kode_penjualan ?></b></div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td><b>No</b></td>
                                        <td><b>Nama Barang</b></td>
                                        <td><b>Harga Jual Barang</b></td>
                                        <td><b>Jumlah</b></td>
                                        <td><b>Satuan</b></td>
                                        <td><b>Expired Date</b></td>
                                        <td><b>Total Harga</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total2 = 0;

                                    foreach ($data_detail_penjualan as $detail) {
                                        $total2 += $detail->total;
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $detail->nama_barang ?></td>
                                        <td>Rp. <?= number_format($detail->harga_jual, '0', ',', '.') ?></td>
                                        <td><?= $detail->jumlah_barang ?></td>
                                        <td><?= $detail->nama_satuan ?></td>
                                        <td><?= $detail->expired_date ?></td>
                                        <td>Rp. <?= number_format($detail->total, '0', ',', '.') ?></td>
                                    </tr>

                                    <?php
                                    }
                                    ?>

                                    <tr style='font-weight:bold; font: size 12px;'>
                                        <td colspan="6">TOTAL</td>
                                        <td>Rp. <?= number_format($total2, 0, ',', '.') ?></td>
                                    </tr>

                                </tbody>
                            </table>
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