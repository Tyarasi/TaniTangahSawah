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

<style>
.action-buttons {
    display: flex;
    gap: 5px;
    justify-content: center;
}
</style>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('bagian/samping.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" data-url="<?= base_url('barang') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Data Barang</h1>
                        </div>
                        <div class="float-right">
                            <!-- Jika aksi bisa owner dan karyawan php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : -->
                            <?php if ($this->session->login['status'] == 'karyawan') : ?>
                            <!-- Success warna hijau , Primary warna biru, danger merah, warning kuning, secondary abu-abu, info tosca, light putih, dark hitam -->
                            <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary btn-sm"><i
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
                    <?php endif ?>
                    <div class="card shadow">
                        <div class="card-header"><strong>Daftar Barang</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama barang</td>
                                            <td>Kategori barang</td>
                                            <td>Stok</td>
                                            <td>Satuan</td>
                                            <td>Harga Jual</td>
                                            <td>Safety Stock</td>
                                            <td>ROP</td>
                                            <td>Status Stok</td>
                                            <!-- Jika aksi bisa owner dan karyawan php if ($this->
                                                session->login['status'] == 'karyawan' ||
                                                $this->session->login['status'] == 'owner') : -->
                                            <?php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : ?>
                                            <td>Aksi</td>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data_barang as $barang) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $barang->nama_barang ?></td>
                                            <td><?= $barang->nama_kategori ?></td>
                                            <td><?= $barang->stok_barang ?></td>
                                            <td><?= $barang->nama_satuan ?></td>
                                            <td>Rp. <?= number_format($barang->harga_jual, '0', ',', '.') ?></td>
                                            <td><?= $barang->safety_stock ?></td>
                                            <td><?= $barang->rop ?></td>
                                            <td>
                                                <?php
                                                $ambilStok = $barang->stok_barang;
                                                $ambilRop = $barang->rop;
                                                if ($ambilStok >= $ambilRop) {
                                                    echo '<a href="#" class="btn btn-info btn-sm">Stok Tersedia</a>';
                                                } else {
                                                    echo '<a href="' . base_url('pembelian/tambah') . '" class="btn btn-danger btn-sm">Stok Hampir Habis</a>';
                                                }
                                                ?>
                                            </td>

                                            <?php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : ?>
                                            <td class="action-buttons">
                                                <?php if ($this->session->login['status'] == 'karyawan' || $this->session->login['status'] == 'owner') : ?>
                                                <a href="<?= base_url('barang/detail/' . $barang->kode_barang) ?>"
                                                    class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                                                <?php endif; ?>

                                                <?php if ($this->session->login['status'] == 'karyawan') : ?>
                                                <a href="<?= base_url('barang/update/' . $barang->kode_barang) ?>"
                                                    class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                                <a onclick="return confirm('Apakah anda yakin?')"
                                                    href="<?= base_url('barang/hapus/' . $barang->kode_barang) ?>"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>

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