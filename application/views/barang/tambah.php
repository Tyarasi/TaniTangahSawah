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
                            <h1 class="h3 m-0 text-gray-800">Tambah Data Barang</h1>
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
                                <div class="card-header"><b>Silakan isi data dibawah ini! </b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('barang/tambah_data') ?>" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_kategori"><b>Kategori Barang</b></label>
                                                <select name="nama_kategori" id="nama_kategori" class="form-control"
                                                    required>
                                                    <option value="">Pilih Kategori</option>
                                                    <?php foreach ($data_kategori as $kategori) { ?>
                                                    <option value="<?php echo $kategori->nama_kategori ?>">
                                                        <?php echo $kategori->nama_kategori ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="nama_barang"><b>Nama Barang</b></label>
                                                <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang"
                                                    autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-row">


                                            <div class="form-group col-md-6">
                                                <label for="kode_barang"><b>Kode Barang</b></label>
                                                <input type="text" name="kode_barang" id="kode_barang"
                                                    placeholder="Masukkan Kode Barang" autocomplete="off"
                                                    class="form-control" readonly required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="stok_barang"><b>Stok Barang</b></label>
                                                <input type="text" name="stok_barang" id="stok_barang"
                                                    placeholder="Masukkan Stok Barang" autocomplete="off"
                                                    class="form-control" required>
                                            </div>


                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_satuan"><b>Satuan Barang</b></label>
                                                <select name="nama_satuan" id="nama_satuan" class="form-control"
                                                    required>
                                                    <option value="">Pilih Satuan</option>
                                                    <?php foreach ($data_satuan as $satuan) { ?>
                                                    <option value="<?php echo $satuan->nama_satuan ?>">
                                                        <?php echo $satuan->nama_satuan ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="harga_beli"><b>Harga Beli</b></label>
                                                <input type="text" name="harga_beli" placeholder="Masukkan Harga Barang"
                                                    autocomplete="off" class="form-control" required>
                                            </div>


                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="harga_jual"><b>Harga Jual</b></label>
                                                <input type="text" name="harga_jual"
                                                    placeholder="Masukkan Harga Jual Barang" autocomplete="off"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="biaya_simpan"><b>Biaya Simpan</b></label>
                                                <input type="text" name="biaya_simpan"
                                                    placeholder="Masukkan Biaya Simpan Barang" autocomplete="off"
                                                    class="form-control" required>
                                            </div>


                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="biaya_pesan"><b>Biaya Pesan</b></label>
                                                <input type="text" name="biaya_pesan"
                                                    placeholder="Masukkan Biaya Simpan Barang" autocomplete="off"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="lead_time"><b>Waktu Tunggu Barang</b></label>
                                                <input type="text" name="lead_time" placeholder="Masukkan Waktu Tunggu"
                                                    autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6" id="kolom_expired" style="display: none;">
                                            <label for="expired"><b>Expired barang</b></label>
                                            <input type="date" name="expired" id="expired" class="form-control">
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
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

<script>
document.addEventListener("DOMContentLoaded", () => {
    const kodeBarangInput = document.querySelector("#kode_barang"); // Gunakan ID untuk memilih elemen input
    const kategoriSelect = document.querySelector("#nama_kategori"); // Gunakan ID untuk memilih elemen select

    const stokBarangInput = document.querySelector("#stok_barang");
    const kolomExpired = document.querySelector("#kolom_expired");
    const expiredInput = document.querySelector("#expired");
    // Fungsi untuk menghasilkan kode barang otomatis berdasarkan kategori
    function generateKodeBarang(kategori) {
        let kodePrefix = "";
        if (kategori === "Pestisida") {
            kodePrefix = "BRGPT-";
        } else if (kategori === "Perlengkapan") {
            kodePrefix = "BRGPK-";
        } else if (kategori === "Pupuk") {
            kodePrefix = "BRGPU-";
        }

        // Generate angka acak antara 100 - 999
        const angkaAcak = Math.floor(Math.random() * 900) + 100;

        // Set nilai input kode_barang
        kodeBarangInput.value = kodePrefix + angkaAcak;
    }

    function toggleKolomExpired() {
        if (parseInt(stokBarangInput.value) > 0 && kategoriSelect.value !== "Perlengkapan") {
            kolomExpired.style.display = "block";
        } else {
            kolomExpired.style.display = "none";
            expiredInput.value = ""; // Reset nilai input expired jika stok nol atau kategori "Perlengkapan"
        }
    }
    // Panggil fungsi generateKodeBarang saat nilai kategori berubah
    kategoriSelect.addEventListener("change", (event) => {
        if (event.target.value !== "") { // Periksa apakah kategori terpilih
            generateKodeBarang(event.target.value);
        } else {
            kodeBarangInput.value = ""; // Reset nilai input jika kategori belum terpilih
        }
    });
    stokBarangInput.addEventListener("input", toggleKolomExpired);
    toggleKolomExpired();
});
</script>



</html>