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
                            <h1 class="h3 m-0 text-gray">History Expired Barang</h1>
                        </div>
                    </div>
                    <hr>

                    <!-- Menambahkan penutup endif; untuk blok if -->
                    <div class="card shadow">
                        <div class="card-header"><b>Expired Date</b></div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Kode barang</td>
                                        <td>Nama barang</td>
                                        <td>Nama Supplier</td>
                                        <td>Stok</td>
                                        <td>Tanggal Expired</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($log_ex as $row) : 
                                        $nama_supplier = ['PT. Mitra Agrindo', 'PT. Bangun Sahabat Tani', 
                                        'PT. Inti Agro Tani', 'PT. Panca Agro', 'PT. Galatta Lestari'];
                                        $random_supplier = $nama_supplier[array_rand($nama_supplier)];
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->kode_barang ?></td>
                                        <td><?= $row->nama_barang ?></td>
                                        <td><?= $random_supplier ?></td>
                                        <td><?= $row->stok_barang ?></td>
                                        <td><?= $row->expired_barang ?></td>
                                        <td>
                                            <a href="<?= base_url('expired/update/' . $row->id) ?>"
                                                class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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