<?php
// Periksa apakah pengguna sudah login atau belum
if (!$this->session->userdata('login')) {
    // Jika belum login, arahkan kembali ke halaman login
    redirect('login'); // Ganti 'login' dengan URL halaman login sesuai proyek Anda
}
?>
<!DOCTYPE html>
<html lang="en">

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/light.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<style>
#chartdiv {
    width: 100%;
    height: 500px;
}
</style>

<head>
    <?php $this->load->view('bagian/head.php') ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar / samping-->
        <?php $this->load->view('bagian/samping.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php $this->load->view('bagian/atas.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                        <?php if ($this->session->login['status'] == 'owner') : ?>
                        <div class="ml-md-auto py-2 py-md-0">
                            <div class="row">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-round dropdown-toggle mb-2" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" style="margin-right: 10px;">
                                        <span class="btn-label">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        Laporan Tahunan
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="<?= base_url('laporan_penjualan_tahun') ?>">Penjualan Barang</a>
                                        <a class="dropdown-item"
                                            href="<?= base_url('laporan_pembelian_tahun') ?>">Pembelian Barang</a>
                                    </div>
                                </div>

                                <div class="dropdown">
                                    <button class="btn btn-info btn-round dropdown-toggle" type="button"
                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="btn-label">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        Laporan Bulanan
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item"
                                            href="<?= base_url('laporan_penjualan_bulan') ?>">Penjualan Barang</a>
                                        <a class="dropdown-item"
                                            href="<?= base_url('laporan_pembelian_bulan') ?>">Pembelian Barang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Info Data Barang -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('barang') ?>"
                                                class="text-xl font-weight-bold text-primary text-uppercase mb-4">Barang</a>
                                            <!-- $jumlah_barang berada di controller Dashboard-->
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_barang ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cube fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Data Supplier -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <!-- text-xl mengatur ukuran font , text-success mengatur warna font (success warna hijau) -->
                                            <a href="<?= base_url('supplier') ?>"
                                                class="text-xl font-weight-bold text-success text-uppercase mb-4">Distributor</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlah_distributor ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <!-- text-xl mengatur ukuran font , text-success mengatur warna font (success warna hijau) -->
                                            <a href="<?= base_url('pembelian') ?>"
                                                class="text-xl font-weight-bold text-info text-uppercase mb-4">Pembelian</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pembelian ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <!-- text-xl mengatur ukuran font , text-success mengatur warna font (success warna hijau) -->
                                            <a href="<?= base_url('penjualan') ?>"
                                                class="text-xl font-weight-bold text-warning text-uppercase mb-4">Penjualan</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_penjualan ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">

                                            <a class="dropdown-item" href="<?= base_url('penjualan') ?>">Data
                                                Penjualan</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="col-md-13">
                                        <div class="col-lg-13">
                                            <div id="chartdiv" style="height:400px;"></div>
                                        </div>

                                        <script>
                                        var chart = am4core.create("chartdiv", am4charts.XYChart);
                                        chart.data = [
                                            <?php foreach ($dataPenjualan as $row) { ?> {
                                                "month": "<?php echo $row->tanggal_penjualan; ?>",
                                                "penjualan": <?php echo $row->penjualan; ?>
                                            },
                                            <?php } ?>
                                        ];

                                        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                                        categoryAxis.dataFields.category = "month";
                                        categoryAxis.title.text = "Month";

                                        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                                        valueAxis.title.text = "Total";

                                        var penjualanSeries = chart.series.push(new am4charts.LineSeries());
                                        penjualanSeries.dataFields.valueY = "penjualan";
                                        penjualanSeries.dataFields.categoryX = "month";
                                        penjualanSeries.name = "Penjualan";
                                        penjualanSeries.strokeWidth = 2;
                                        penjualanSeries.fillOpacity = 0;
                                        penjualanSeries.bullets.push(new am4charts.CircleBullet());
                                        penjualanSeries.tooltipText = "Penjualan: {valueY}";

                                        chart.cursor = new am4charts.XYCursor();
                                        chart.legend = new am4charts.Legend();
                                        chart.exporting.menu = new am4core.ExportMenu();
                                        chart.exporting.menu.align = "right";
                                        chart.exporting.menu.verticalAlign = "bottom";

                                        chart.theme = am4themes_animated;
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Aktivitas Transaksi -->
                        <div class="col-xl-4 col-lg-5 ">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Transaksi Terakhir</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h4 class="mt-2 text-warning b-b1 pb-2 fw-bold">Total Penjualan Barang</h4>
                                    <h5 class="mb-1 fw-bold text-gray-800"><?php echo $jumlah_barang_sell; ?></h5>
                                    <hr class="sidebar-divider">
                                    <h4 class="mt-2 text-info b-b1 pb-2 fw-bold">Pembelian Barang Terakhir</h4>
                                    <?php foreach ($pembelian_akhir as $item) : ?>
                                    <li class="d-flex justify-content-between pb-1 pt-1">
                                        <small><?php echo $item->nama_barang; ?></small>
                                        <span><?php echo $item->jumlah_barang; ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                    <hr class="sidebar-divider">
                                    <h4 class="mt-2 text-warning b-b1 pb-2 fw-bold">Penjualan Barang Terakhir</h4>
                                    <?php foreach ($penjualan_akhir as $item) : ?>
                                    <li class="d-flex justify-content-between pb-1 pt-1">
                                        <small><?php echo $item->nama_barang; ?></small>
                                        <span><?php echo $item->jumlah_barang; ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer bawah -->
            <?php $this->load->view('bagian/bawah.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        <!-- End of Page Wrapper -->

        <?php $this->load->view('bagian/all_js.php') ?>
</body>

</html>