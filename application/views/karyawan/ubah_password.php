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
            <div id="content" data-url="<?= base_url('karyawan') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('bagian/atas.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">Ubah Password Akun</h1>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- mb-4 menambah margin dibawah -->
                            <div class="card shadow mb-4">
                                <div class="card-header"><b>Ubah password akun</b></div>
                                <div class="card-body">
                                    <form action="<?= base_url('karyawan/update_password/' . $karyawan->karyawan_id) ?>" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password"><b>Password lama</b></label>
                                                <div class="input-group">
                                                    <input type="password" name="password" id="password" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-eye" id="togglePassword"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password baru"><b>Password baru</b></label>
                                                <div class="input-group">
                                                    <input type="password" name="password_baru" id="password_baru" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-eye" id="togglePasswordBaru"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="konfirmasi password"><b>Konfirmasi password baru</b></label>
                                                <div class="input-group">
                                                    <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-eye" id="toggleKonfirmasiPassword"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Ubah password</button>
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
    const togglePassword = document.querySelectorAll('#togglePassword, #togglePasswordBaru, #toggleKonfirmasiPassword');
    const passwordInputs = document.querySelectorAll('#password, #password_baru, #konfirmasi_password');

    togglePassword.forEach((toggle, index) => {
        toggle.addEventListener('click', function() {
            const type = passwordInputs[index].getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInputs[index].setAttribute('type', type);
            toggle.classList.toggle('fa-eye-slash');
        });
    });
</script>

</html>