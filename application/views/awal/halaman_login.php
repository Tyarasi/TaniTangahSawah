<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('bagian/head.php') ?>
</head>

<!-- Untuk mengatur warna latar belakang. Success warna hijau , Primary warna biru, danger merah, warning kuning. Gradient pengaturan warna-->

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <!-- Mengatur ukuran layar putih -->
            <div class="col-sm-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>assets/gambar/LOGO.png" class="rounded" style="display:block;  margin:auto; margin-bottom:20px " width="150" height="200">
                                    </div>

                                    <form class="user" method="post" action="<?= site_url('login/user_login') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control " id="username" placeholder="Masukkan username" name="username" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control " id="password" placeholder="Masukkan password" name="password" required autofocus>
                                            <div class="tulisanCheckbox">
                                                <input class="checkbox" type="checkbox" onclick="myFunction()">
                                                Tampilkan Password
                                            </div>
                                        </div>

                                        <!-- Notification for "Anda Harus Login Terlebih Dahulu" -->
                                        <?php if ($this->session->flashdata('error')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $this->session->flashdata('error') ?>
                                            </div>
                                        <?php endif; ?>
                                        <!-- Warning warna kuning -->
                                        <button type="submit" class="btn btn-warning btn-block" name="login">
                                            Login
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--mencari elemen id password, mengubah tipe password menjadi text -->
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <style>
        .checkbox {
            height: 12px;
            width: 12px;
        }

        .tulisanCheckbox {
            font-size: 12px;
        }
    </style>

    <?php $this->load->view('bagian/all_js.php') ?>

</body>

</html>