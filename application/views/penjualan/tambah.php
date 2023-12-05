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
            <div id="content" data-url="<?= base_url('penjualan') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Tambah Transaksi Penjualan</h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('penjualan') ?>" class="btn btn-secondary btn-sm"><i
                                    class="fa fa-arrow-left"></i>&ensp;Kembali</a>
                        </div>
                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <b>Silakan isi form di bawah ini!</b>
                                </div>

                                <div class="card-body">
                                    <form action="<?= base_url('penjualan/tambah_data') ?>" id="form-tambah"
                                        method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label>Kode Transaksi Penjualan</label>
                                                <input type="text" name="kode_penjualan" value="PJL<?= time() ?>"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Tanggal Terjual</label>
                                                <input type="date" name="tanggal_penjualan" value="<?= date('d/m/Y') ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Jam</label>
                                                <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>"
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
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
                                                <label>Jumlah</label>
                                                <input type="number" name="jumlah_barang" value="" class="form-control"
                                                    min='1' readonly>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Satuan</label>
                                                <input type="text" name="nama_satuan" value="" class="form-control"
                                                    readonly>
                                            </div>

                                            <input type="hidden" name="nama_satuan" value="">

                                            <div class="form-group col-2">
                                                <label>Harga Jual</label>
                                                <input type="number" name="harga_jual" value="" class="form-control"
                                                    min='1' readonly>
                                            </div>
                                            <div class="form-group col-2">
                                                <label>Total</label>
                                                <input type="number" name="total" value="" class="form-control" min='0'
                                                    id="total" readonly>
                                            </div>

                                            <div class="form-group col-2" id="form_group_expired_date">
                                                <label for="expired_date" id="expired_date_label">Expired Date</label>
                                                <input type="date" name="expired_date" value="" class="form-control"
                                                    min="0" id="expired_date" readonly>
                                            </div>


                                            <div class="form-group col-2">
                                                <label for="">&nbsp;</label>
                                                <button disabled type="button" class="btn btn-primary btn-block"
                                                    id="tambah">Tambah</button>
                                            </div>
                                        </div>

                                        <div class="proses">
                                            <br>
                                            <center>
                                                <h2>Detail Transaksi Penjualan</h2>
                                            </center>
                                            <hr>
                                            <table class="table table-bordered" id="proses">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Nama Barang</td>
                                                        <td width="15%">Kode Barang</td>
                                                        <td width="15%">Jumlah</td>
                                                        <td width="10%">Satuan</td>
                                                        <td width="10%">Harga Jual</td>
                                                        <td width="10%">Total</td>
                                                        <td width="15%">Aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <tfoot>
                                                <div class="card-action">
                                                    <input type="hidden" name="max_hidden" value="">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                    <a href="<?= base_url('penjualan') ?>"
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
            </div>

            <!-- load footer -->
            <?php $this->load->view('bagian/bawah.php') ?>
        </div>
    </div>
    <!-- load semua js -->
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

        $('#nama_satuan').on('change', function() {
            $(this).prop('disabled', true)
            $('#resetSatuan').prop('disabled', false)
            $('input[name="nama_satuan"]').val($(this).val())
        })

        $(document).on('click', '#resetSatuan', function() {
            $('#nama_satuan').val('')
            $('#nama_satuan').prop('disabled', false)
            $(this).prop('disabled', true)
            $('input[name="nama_satuan"]').val('')
        })

        $(document).on('change', '#nama_barang', function() {
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
                        $('input[name="kode_barang"]').val(data.kode_barang);
                        $('input[name="nama_satuan"]').val(data.nama_satuan);
                        $('input[name="harga_jual"]').val(data.harga_jual);
                        $('input[name="jumlah_barang"]').val(0);
                        $('input[name="max_hidden"]').val(data.stok);
                        $('input[name="jumlah_barang"]').prop('readonly', false);
                        $('input[name="total"]').val(data.total);
                        $('button#tambah').prop('disabled', false);

                        // Mengambil nilai "BRGPK" dari kode_barang
                        var kodePrefix = data.kode_barang.split('-')[0];

                        if (kodePrefix === 'BRGPK') {
                            // Sembunyikan label, input, dan form group expired_date
                            $('#expired_date_label').hide();
                            $('#expired_date_input').hide();
                            $('#form_group_expired_date').hide();
                        } else {
                            // Tampilkan label, input, dan form group expired_date
                            $('#expired_date_label').show();
                            $('#expired_date_input').show();
                            $('#form_group_expired_date').show();
                            // Menggunakan tanggal hari ini sebagai nilai default
                            $('#expired_date').val('<?php echo date('Y-m-d'); ?>');
                        }

                        $('input[name="jumlah_barang"]').on('input', function() {
                            $('input[name="total"]').val($(this).val() * $(
                                'input[name="harga_jual"]').val());
                        });

                        const url_get_min_expired = $('#content').data('url') +
                            '/get_min_expired';
                        $.ajax({
                            url: url_get_min_expired,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                kode_barang: data.kode_barang
                            },
                            success: function(minExpiredData) {
                                $('input[name="expired_date"]').val(
                                    minExpiredData.min_expired_date);
                                $('button#tambah').prop('disabled', false);
                            }
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
                harga_jual: $('input[name="harga_jual"]').val(),
                total: $('input[name="total"]').val(),
            }

            if (parseInt($('input[name="max_hidden"]').val()) < parseInt(data_proses.jumlah_barang)) {
                alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]')
                    .val()))
            } else {
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
            }
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
            $('input[name="harga_jual"]').prop('disabled', true)
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
            $('input[name="harga_jual"]').val('')
            $('input[name="jumlah_barang"]').prop('readonly', true)
            $('input[name="nama_satuan"]').val('')
            $('input[name="total"]').prop('readonly', true)
            $('button#tambah').prop('disabled', true)
        }
    })
    </script>
</body>

</html>