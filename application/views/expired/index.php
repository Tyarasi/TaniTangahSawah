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
                            <h1 class="h3 m-0 text-gray">Detail Expired Barang</h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('expired/riwayat') ?>" class="btn btn-primary btn-sm"></i>Riwayat
                                Expired&nbsp;&nbsp;</a>
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
                                        <td>Stok</td>
                                        <td>Tanggal Expired</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($expired as $row) :
                                        $expiredDate = strtotime($row->expired_barang);
                                        $today = strtotime(date('Y-m-d'));
                                        $status = ($expiredDate < $today) ? 'Kadaluarsa' : '';

                                        // Menghilangkan tanda "-" dan tiga angka di belakang kode_barang
                                        $kode_barang_without_suffix = substr($row->kode_barang, 0, -4);
                                        $random_suffix = '- ' . sprintf('%03d', rand(0, 999));

                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kode_barang_without_suffix ?> <?= $random_suffix ?></td>
                                        <td><?= $row->nama_barang ?></td>
                                        <td><?= $row->stok_barang ?></td>
                                        <td><?= $row->expired_barang ?></td>
                                        <?php
                                            if ($status == null) { ?>
                                        <td>
                                            <span class='badge badge-primary'>Belum kadaluwarsa</span>
                                        </td>
                                        <?php
                                            } else { ?>
                                        <td>
                                            <?php
                                            $clean_nama_barang = urlencode(base64_encode($row->nama_barang));
                                            ?>
                                            <span class='badge badge-danger'><?= $status ?></span>
                                            <a onclick="return confirm('Apakah anda yakin?')"
                                                href="<?= base_url('expired/log_expired/' . $row->id . '/' . $row->stok_barang . '/' . $clean_nama_barang) ?>"
                                                class="btn btn-danger btn-sm"><i class="fas fa-plane"></i></a>
                                        </td>
                                        <?php } ?>
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