<?php
// Periksa apakah pengguna sudah login atau belum
if (!$this->session->userdata('login')) {
    // Jika belum login, arahkan kembali ke halaman login
    redirect('login'); // Ganti 'login' dengan URL halaman login sesuai proyek Anda
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Untuk membuat data menjadi excel xlsx.full.min.js-->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

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
                            <h1 class="h3 m-0 text-gray">Detail Transaksi Pembelian</h1>
                        </div>
                        <div class="float-right">
                            <!-- &ensp spasi dua kali, &nbsp; sekali spasi -->
                            <a href="<?= base_url('pembelian') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i>&ensp;Kembali</a>
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
                        <div class="card-header"><b>Detail Transaksi - <?= $pembelian->kode_pembelian ?></b></div>
                        <div class="card-body">
                            <div class="float-right">
                                <div class="card-tools">
                                    <button class="btn btn-info btn-border btn-round btn-sm mr-2" onclick="exportToExcel()">
                                        <span class="btn-label">
                                            <i class="fa fa-file-excel"></i>
                                        </span>
                                        Export Excel
                                    </button>
                                </div>
                            </div>

                            <table id="add" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td><b>No</b></td>
                                        <td><b>Nama Barang</b></td>
                                        <td><b>Harga Beli Barang</b></td>
                                        <td><b>Jumlah</b></td>
                                        <td><b>Satuan</b></td>
                                        <td><b>Total Harga</b></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total2 = 0;

                                    foreach ($data_detail_pembelian as $detail) {
                                        $total2 += $detail->total;
                                    ?>

                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $detail->nama_barang ?></td>
                                            <td>Rp. <?= number_format($detail->harga_beli, '0', ',', '.') ?></td>
                                            <td><?= $detail->jumlah_barang ?></td>
                                            <td><?= $detail->nama_satuan ?></td>
                                            <td>Rp. <?= number_format($detail->total, '0', ',', '.') ?></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                    <tr style='font-weight:bold; font: size 12px;'>
                                        <td colspan="5">TOTAL</td>

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

    <script>
        // Fungsi untuk ekspor ke Excel
        function exportToExcel() {
            const table = document.getElementById('add');
            const workbook = XLSX.utils.table_to_book(table);
            const wbout = XLSX.write(workbook, {
                bookType: 'xlsx',
                type: 'array'
            });
            const blob = new Blob([wbout], {
                type: 'application/octet-stream'
            });
            saveBlob(blob, 'Laporan Pembelian Harian.xlsx');
        }

        // Fungsi utilitas untuk menyimpan file
        function saveBlob(blob, filename) {
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.setAttribute('download', filename);
            link.click();
        }

        // Fungsi utilitas untuk mengubah tabel menjadi array data
        function tableToData(table) {
            const data = [];
            const headers = [];
            for (let i = 0; i < table.rows[0].cells.length; i++) {
                headers.push(table.rows[0].cells[i].innerText);
            }
            headers.push('Total Harga'); // Menambahkan judul kolom Total Harga
            data.push(headers);
            for (let i = 1; i < table.rows.length; i++) {
                const row = [];
                for (let j = 0; j < table.rows[i].cells.length; j++) {
                    row.push(table.rows[i].cells[j].innerText);
                }
                const totalHarga = table.rows[i].querySelector('.total_harga').innerText; // Mendapatkan nilai total_harga dari elemen dengan kelas total_harga
                row.push(totalHarga); // Menambahkan total_harga ke baris data
                data.push(row);
            }
            return data;
        }
    </script>




</body>

</html>