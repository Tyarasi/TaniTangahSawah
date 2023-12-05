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
                            <h1 class="h3 m-0 text-gray-800">Ubah Data Expired</h1>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Silakan ubah data dibawah ini! </b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('expired/update_data/'. $expired[0]->id)  ?>"
                                        method="POST">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="biaya_pesan"><b>Approve Barang</b></label>
                                                <select name="access_expired" id="access_expired" class="form-control"
                                                    required>
                                                    <option value="">- Jenis Status -</option>
                                                    <option value="1">Diterima</option>
                                                    <option value="0">Belum Diterima</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="stok_barang" autocomplete="off"
                                                value="<?= $expired[0]->stok_barang?>" class="form-control">
                                            <input type="hidden" name="nama_barang" autocomplete="off"
                                                class="form-control" value="<?= $expired[0]->nama_barang?>">

                                            <div class=" form-group col-md-6">
                                                <label for="expired_barang"><b>Tanggal Expired Baru</b></label>
                                                <input type="date" name="expired_barang" autocomplete="off"
                                                    class="form-control">
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