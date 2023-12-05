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
            <div id="content" data-url="<?= base_url('kategori') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Ubah Data Kategori</h1>
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Silakan ubah data dibawah ini! </b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('kategori/update_data/' . $kategori->kategori_id) ?>"
                                        method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_kategori"><b>Nama kategori</b></label>
                                                <input type="text" name="nama_kategori"
                                                    placeholder="Masukkan Nama kategori" autocomplete="off"
                                                    class="form-control" required
                                                    value="<?= $kategori->nama_kategori ?>">
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <a href="<?= base_url('kategori') ?>" class="btn btn-danger">Batal</a>

                                        </div>
                                    </form>
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