<?php
// Periksa apakah pengguna sudah login atau belum
if (!$this->session->userdata('login')) {
    // Jika belum login, arahkan kembali ke halaman login
    redirect('login'); // Ganti 'login' dengan URL halaman login sesuai proyek Anda
}
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.2.0/papaparse.min.js"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<head>
    <?php $this->load->view('bagian/head.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('bagian/samping.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Data Pembelian Barang Bulanan Tani Tangah Sawah</h1>
                        </div>
                        <div class="float-right">
                            <!-- &ensp spasi dua kali, &nbsp; sekali spasi -->
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i>&ensp;Kembali</a>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Silakan isi data bulan pembelian!</b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('laporan_pembelian_bulan/generate') ?>" method="POST">
                                        <div class="clearfix">
                                            <div class="float-left col-md-2" style="margin-right: 10px;">
                                                <select name="bulan" id="bulan" class="form-control" placeholder="Masukkan Bulan" aria-describedby="basic-addon1">
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>

                                            <div class="float-center">
                                                <button type="submit" value="Generate" class="btn btn-primary">Cari</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Laporan Pembelian Barang Bulanan </b>
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
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td><b>Kode Transaksi Pembelian</td><b></b>
                                                    <td><b>Tanggal Pembelian</td></b>
                                                    <td><b>Nama Barang</td></b>
                                                    <td><b>Jumlah</td></b>
                                                    <td><b>Harga</td></b>
                                                    <td><b>Total</td></b>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total_harga2 = 0;
                                                foreach ($laporan as $item) :

                                                    $total_harga2 += $item->jumlah_barang * $item->harga_beli;

                                                endforeach;

                                                foreach ($laporan as $barang) : ?>
                                                    <tr>
                                                        <td><?php echo $barang->kode_pembelian; ?></td>
                                                        <td><?php echo date('d M Y', strtotime($barang->tanggal_pembelian)); ?></td>
                                                        <td><?php echo $barang->nama_barang; ?></td>
                                                        <td><?php echo $barang->jumlah_barang; ?> <?php echo $barang->nama_satuan; ?></td>
                                                        <td>Rp. <?php echo number_format($barang->harga_beli, '0', ',', '.'); ?></td>
                                                        <td>Rp. <?php echo number_format($barang->total_harga, '0', ',', '.'); ?></td>
                                                    <?php endforeach
                                                    ?>
                                                    </tr>
                                                    <tr style='font-weight:bold; font: size 12px;'>
                                                        <td colspan="5">Total Pembelian</td>
                                                        <td>Rp. <?= number_format($total_harga2, '0', ',', '.') ?></td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>



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
            saveBlob(blob, 'Laporan Pembelian Bulanan.xlsx');
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