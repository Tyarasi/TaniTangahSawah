<?php
// Periksa apakah pengguna sudah login atau belum
if (!$this->session->userdata('login')) {

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
            <!-- load Topbar -->
            <?php $this->load->view('bagian/atas.php'); ?>

            <div class="container-fluid">
                <div class="clearfix">
                    <div class="float-left">
                        <h1 class="h3 m-0 text-gray">Detail Barang</h1>
                    </div>
                    <div class="float-right">
                        <!-- &ensp spasi dua kali, &nbsp; sekali spasi -->
                        <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i
                                class="fa fa-arrow-left"></i>&ensp;Kembali</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <!-- mb-4 menambah margin dibawah -->
                        <div class="card shadow mb-4">
                            <div class="card-header"><strong> Detail Barang - <?= $barang->kode_barang ?></strong></div>

                            <div class="card-body">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="kode_barang"><strong>Kode Barang</strong></label>
                                        <input type="text" name="kode_barang" autocomplete="off" class="form-control"
                                            value="<?= $barang->kode_barang ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nama_barang"><strong>Nama barang</strong></label>
                                        <input type="text" name="nama_barang" autocomplete="off" class="form-control"
                                            value="<?= $barang->nama_barang ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="nama_kategori"><strong>Kategori Barang</strong></label>
                                        <input type="text" name="nama_kategori" autocomplete="off" class="form-control"
                                            value="<?= $barang->nama_kategori ?>" readonly>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="stok_barang"><strong>Stok Barang</strong></label>
                                        <input type="text" name="stok_barang" autocomplete="off" class="form-control"
                                            value="<?= $barang->stok_barang ?>" readonly>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="nama_satuan"><strong>Satuan Barang</strong></label>
                                        <input type="text" name="nama_satuan" autocomplete="off" class="form-control"
                                            value="<?= $barang->nama_satuan ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="harga_beli"><strong>Harga Beli</strong></label>
                                        <input type="text" name="harga_beli" autocomplete="off" class="form-control"
                                            value="<?= $barang->harga_beli ?>" readonly>
                                    </div>


                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="harga_jual"><strong>Harga Jual</strong></label>
                                        <input type="text" name="harga_jual" autocomplete="off" class="form-control"
                                            value="<?= $barang->harga_jual ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="biaya_simpan"><strong>Biaya Simpan</strong></label>
                                        <input type="text" name="biaya_simpan" autocomplete="off" class="form-control"
                                            value="<?= $barang->biaya_simpan ?>" readonly>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="biaya_pesan"><strong>Biaya Pesan</strong></label>
                                        <input type="text" name="biaya_pesan" autocomplete="off" class="form-control"
                                            value="<?= $barang->biaya_pesan ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lead_time"><strong>Waktu Tunggu Barang</strong></label>
                                        <input type="text" name="lead_time" autocomplete="off" class="form-control"
                                            value="<?= $barang->lead_time ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="eoq"><strong>EOQ</strong></label>
                                        <input type="text" name="eoq" autocomplete="off" class="form-control"
                                            value="<?= $barang->eoq ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="rop"><strong>ROP</strong></label>
                                        <input type="text" name="rop" autocomplete="off" class="form-control"
                                            value="<?= $barang->rop ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="safety_stock"><strong>Safety Stock</strong></label>
                                        <input type="text" name="safety_stock" autocomplete="off" class="form-control"
                                            value="<?= $barang->safety_stock ?>" readonly>
                                    </div>
                                </div>
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