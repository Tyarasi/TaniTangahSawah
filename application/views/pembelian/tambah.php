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
            <div id="content" data-url="<?= base_url('pembelian') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Tambah Transaksi Pembelian</h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('pembelian') ?>" class="btn btn-secondary btn-sm"><i
                                    class="fa fa-arrow-left"></i>&ensp;Kembali</a>
                        </div>
                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <b><span>Silakan isi form di bawah ini!</span></b>
                                </div>

                                <div class="card-body">
                                    <form action="<?= base_url('pembelian/tambah_data') ?>" id="form-tambah"
                                        method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label>Kode Transaksi Pembelian</label>
                                                <input type="text" name="kode_pembelian" value="PBL<?= time() ?>"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Tanggal Pembelian</label>
                                                <input type="date" name="tanggal_pembelian" value="<?= date('d/m/Y') ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Jam</label>
                                                <input type="text" name="jam_pembelian" value="<?= date('H:i:s') ?>"
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-8">
                                                <label for="nama_distributor">Nama Distributor</label>
                                                <select name="nama_distributor" id="nama_distributor"
                                                    class="form-control">
                                                    <option value="">Pilih Distributor</option>
                                                    <?php foreach ($data_distributor as $distributor) : ?>
                                                    <option value="<?= $distributor->nama_distributor ?>">
                                                        <?= $distributor->nama_distributor ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for="">&nbsp;</label>
                                                <button disabled type="button" class="btn btn-danger btn-block"
                                                    id="reset">Reset</button>
                                            </div>
                                            <input type="hidden" name="nama_distributor" value="">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="nama_barang">Nama Barang</label>
                                                <select name="nama_barang" id="nama_barang" class="form-control">
                                                    <option value="">Pilih Barang</option>
                                                    <?php foreach ($data_barang as $barang) : ?>
                                                    <option value="<?= $barang->nama_barang ?>">
                                                        <?= $barang->nama_barang ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Kode Barang</label>
                                                <input type="text" name="kode_barang" value="" class="form-control"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-4">
                                                <label>EOQ </label>
                                                <input type="number" name="eoq" value="" class="form-control" min='1'
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label>Jumlah Barang</label>
                                                <input type="number" name="jumlah_barang" value="" class="form-control"
                                                    min='0' readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Satuan</label>
                                                <input type="text" name="nama_satuan" value="" class="form-control"
                                                    readonly>

                                            </div>
                                            <input type="hidden" name="nama_satuan" value="">

                                            <div class="form-group col-4">
                                                <label>Harga Beli</label>
                                                <input type="number" name="harga_beli" value="" class="form-control"
                                                    min='1' readonly>
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Expired-Date</label>
                                                <input type="date" name="expired_date" value="<?= date('d/m/Y') ?>"
                                                    class="form-control" id="expired">
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Total Harga</label>
                                                <input type="number" name="total" value="" class="form-control" min='0'
                                                    id="total" readonly>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="">&nbsp;</label>
                                                <button disabled type="button" class="btn btn-primary"
                                                    id="tambah">Tambah</button>
                                            </div>

                                        </div>

                                        <div class="proses">
                                            <br>
                                            <center>
                                                <h2>Detail Transaksi Pembelian</h2>
                                            </center>
                                            <hr>
                                            <table class="table table-bordered" id="proses">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Nama Barang</td>
                                                        <td width="15%">Kode Barang</td>
                                                        <td width="10%">Jumlah</td>
                                                        <td width="10%">Satuan</td>
                                                        <td width="15%">Harga Pembelian</td>
                                                        <td width="10%">Total</td>
                                                        <td width="10%">Aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <tfoot>
                                                <div class="card-action">
                                                    <input type="hidden" name="max_hidden" value="">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                    <a href="<?= base_url('pembelian') ?>"
                                                        class="btn btn-danger">Cancel</a>
                                                </div>
                                            </tfoot>
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
        <?php $this->load->view('bagian/all_js.php') ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            $('tfoot').hide()

            $(document).keypress(function(event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            })

            $('#nama_distributor').on('change', function() {
                $(this).prop('disabled', true)
                $('#reset').prop('disabled', false)
                $('input[name="nama_distributor"]').val($(this).val())
            })

            $(document).on('click', '#reset', function() {
                $('#nama_distributor').val('')
                $('#nama_distributor').prop('disabled', false)
                $(this).prop('disabled', true)
                $('input[name="nama_distributor"]').val('')
            })

            $('#nama_barang').on('change', function() {
                if ($(this).val() == '') {
                    reset();
                } else {
                    const url_get_data_barang = $('#content').data('url') + '/get_data_barang';
                    $.ajax({
                        url: url_get_data_barang,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            nama_barang: $(this).val()
                        },
                        success: function(data) {
                            var oldKodeBarang = data.kode_barang;

                            // Mengganti nilai angka pada kode barang yang lama dengan angka baru
                            var newAngka = getNewRandomAngka();
                            var newKodeBarang = replaceAngkaInKode(oldKodeBarang, newAngka);

                            $('input[name="kode_barang"]').val(data.kode_barang);
                            $('input[name="harga_beli"]').val(data.harga_beli);
                            $('input[name="nama_satuan"]').val(data.nama_satuan);
                            $('input[name="eoq"]').val(data.eoq);
                            $('input[name="jumlah_barang"]').val(0);
                            $('input[name="max_hidden"]').val(data.stok_barang);
                            $('input[name="jumlah_barang"]').prop('readonly', false);
                            $('input[name="total"]').val(data.total);
                            $('button#tambah').prop('disabled', false);

                            if (!newKodeBarang.startsWith('BRGPK')) {
                                $('#expired').closest('.form-group')
                                    .show(); // Tampilkan kolom expired
                            } else {
                                $('#expired').closest('.form-group')
                                    .hide(); // Sembunyikan kolom expired
                            }

                            $('input[name="jumlah_barang"]').on('keydown keyup change blur',
                                function() {
                                    $('input[name="total"]').val($(
                                            'input[name="jumlah_barang"]').val() *
                                        $('input[name="harga_beli"]').val());
                                });
                        }
                    });

                }
            });


            $(document).on('click', '#tambah', function(e) {
                const url_proses_barang = $('#content').data('url') + '/proses_barang'
                const data_proses = {
                    nama_barang: $('select[name="nama_barang"]').val(),
                    kode_barang: $('input[name="kode_barang"]').val(),
                    jumlah_barang: $('input[name="jumlah_barang"]').val(),
                    nama_satuan: $('input[name="nama_satuan"]').val(),
                    harga_beli: $('input[name="harga_beli"]').val(),
                    total: $('input[name="total"]').val(),
                }

                $.ajax({
                    url: url_proses_barang,
                    type: 'POST',
                    data: data_proses,
                    success: function(data) {
                        if ($('select[name="nama_barang"]').val() == data_proses
                            .nama_barang) $('option[value="' + data_proses.nama_barang +
                            '"]').hide()
                        reset()

                        $('table#proses tbody').append(data)
                        $('tfoot').show()

                        $('#total').html('<strong>' + hitung_total() + '</strong>')
                        $('input[name="total_hidden"]').val(hitung_total())
                    }
                })
            })


            $(document).on('click', '#tombol-hapus', function() {
                $(this).closest('.row-proses').remove()

                $('option[value="' + $(this).data('nama-barang') + '"]').show()

                if ($('tbody').children().length == 0) $('tfoot').hide()
            })

            $('button[type="submit"]').on('click', function() {
                $('input[name="kode_barang"]').prop('disabled', true)
                $('select[name="nama_barang"]').prop('disabled', true)
                $('input[name="nama_satuan"]').prop('disabled', true)
                $('input[name="jumlah_barang"]').prop('disabled', true)
                $('input[name="harga_beli"]').prop('disabled', true)
                $('input[name="total"]').prop('disabled', true)
            })

            function hitung_total() {
                let total = 0;
                $('.total').each(function() {
                    total += parseInt($(this).text())
                })

                return total;
            }

            function reset() {
                $('#nama_barang').val('')
                $('input[name="kode_barang"]').val('')
                $('input[name="jumlah_barang"]').val('')
                $('input[name="harga_beli"]').val('')
                $('input[name="jumlah_barang"]').prop('readonly', true)
                $('input[name="nama_satuan"]').val('')
                $('input[name="total"]').prop('readonly', true)
                $('button#tambah').prop('disabled', true)
            }

            function getNewRandomAngka() {
                return Math.floor(Math.random() * (999 - 100 + 1)) + 100;
            }

            function replaceAngkaInKode(kode, angkaBaru) {
                var prefix = kode.substring(0, 6);
                return prefix + angkaBaru;
            }
        })
        </script>
</body>

</html>