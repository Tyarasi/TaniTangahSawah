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
            <div id="content" data-url="<?= base_url('barang') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Ubah Data Barang</h1>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Silakan ubah data dibawah ini! </b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('barang/update_data/' . $barang->kode_barang)  ?>" method="POST">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="kode_barang"><b>Kode Barang</b></label>
                                                <input type="text" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" class="form-control" value="BRG-<?= mt_rand(100, 999) ?>" maxlength="3" readonly required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="nama_barang"><b>Nama barang</b></label>
                                                <input type="text" name="nama_barang" placeholder="Masukkan Nama barang" autocomplete="off" class="form-control" required value="<?= $barang->nama_barang ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="nama_kategori"><b>Kategori Barang</b></label>
                                                <select name="nama_kategori" id="nama_kategori" class="form-control" required>
                                                    <option value="">- Pilih Kategori -</option>
                                                    <?php foreach ($data_kategori as $kategori) : ?>
                                                        <option value="<?= $kategori->nama_kategori ?>" <?= $barang->nama_kategori == $kategori->nama_kategori ? 'selected' : null ?>>
                                                            <?= $kategori->nama_kategori ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="stok_barang"><b>Stok Barang</b></label>
                                                <input type="text" name="stok_barang" placeholder="Masukkan Stok Barang" autocomplete="off" class="form-control" required value="<?= $barang->stok_barang ?>">
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="nama_satuan"><b>Satuan Barang</b></label>
                                                <select name="nama_satuan" id="nama_satuan" class="form-control" required>
                                                    <option value="">- Pilih Satuan -</option>
                                                    <?php foreach ($data_satuan as $satuan) : ?>
                                                        <option value="<?= $satuan->nama_satuan ?>" <?= $barang->nama_satuan == $satuan->nama_satuan ? 'selected' : null ?>>
                                                            <?= $satuan->nama_satuan ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="harga_beli"><b>Harga Beli</b></label>
                                                <input type="text" name="harga_beli" placeholder="Masukkan Harga Barang" autocomplete="off" class="form-control" required value="<?= $barang->harga_beli ?>">
                                            </div>


                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="harga_jual"><b>Harga Jual</b></label>
                                                <input type="text" name="harga_jual" placeholder="Masukkan Harga Jual Barang" autocomplete="off" class="form-control" required value="<?= $barang->harga_jual ?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="biaya_simpan"><b>Biaya Simpan</b></label>
                                                <input type="text" name="biaya_simpan" placeholder="Masukkan Biaya Simpan Barang" autocomplete="off" class="form-control" required value="<?= $barang->biaya_simpan ?>">
                                            </div>


                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="biaya_pesan"><b>Biaya Pesan</b></label>
                                                <input type="text" name="biaya_pesan" placeholder="Masukkan Biaya Simpan Barang" autocomplete="off" class="form-control" required value="<?= $barang->biaya_pesan ?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="lead_time"><b>Waktu Tunggu Barang</b></label>
                                                <input type="text" name="lead_time" placeholder="Masukkan Waktu Tunggu" autocomplete="off" class="form-control" required value="<?= $barang->lead_time ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <a href="<?= base_url('barang') ?>" class="btn btn-danger">Batal</a>

                                        </div>
                                    </form>
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