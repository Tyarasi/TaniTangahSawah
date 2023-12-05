        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url(); ?>assets/gambar/LOGO.png" class="rounded"
                        style="display:block; margin:auto;" width="100" height="60">
                </div>
            </a>

            <!-- Divider  Untuk Garis-->
            <hr class="sidebar-divider my-0">
            <!-- Class Active khususnya pada menu navigasi digunakan sebagai
             penanda pada menu tersebut ketika halaman website tersebut dibuka. -->
            <li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-heartbeat"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!--Akses hanya untuk karyawan  -->
            <?php if ($this->session->login['status'] == 'karyawan') : ?>
            <div class="sidebar-heading">
                Data Barang
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="<?= base_url('barang') ?>" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-cube"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li class="nav-item <?= $aktif == 'expired_date' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="<?= base_url('expired') ?>" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-cube"></i>
                    <span>Expired Barang</span>
                </a>
            </li>


            <li class="nav-item <?= $aktif == 'kategori' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="<?= base_url('kategori') ?>" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-boxes"></i>
                    <span>Kategori Barang</span>
                </a>
            </li>

            <li class="nav-item <?= $aktif == 'satuan' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="<?= base_url('satuan') ?>" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-tags"></i>
                    <span>Satuan Barang</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Data Distributor
            </div>

            <li class="nav-item <?= $aktif == 'distributor' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('distributor') ?>">
                    <i class="fas fa-users"></i>
                    <span>Distributor</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Transaksi
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?= $aktif == 'pembelian' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('pembelian') ?>">
                    <i class="fas fa-cart-plus"></i>
                    <span>Pembelian Barang</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= $aktif == 'penjualan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('penjualan') ?>">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Penjualan Barang</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php endif; ?>

            <?php if ($this->session->login['status'] == 'karyawan') : ?>
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <li class="nav-item <?= $aktif == 'profile_karyawan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('profile_karyawan') ?>">
                    <i class=" fas fa-store"></i>
                    <span>Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php endif; ?>

            <!-- Heading -->
            <?php if ($this->session->login['status'] == 'owner') : ?>
            <div class="sidebar-heading">
                Data Karyawan
            </div>

            <li class="nav-item <?= $aktif == 'karyawan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('karyawan') ?>">
                    <i class="fas fa-user"></i>
                    <span>Karyawan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php endif; ?>

            <!-- Heading -->
            <?php if ($this->session->login['status'] == 'owner') : ?>
            <div class="sidebar-heading">
                PENGATURAN
            </div>

            <li class="nav-item <?= $aktif == 'owner' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('owner') ?>">
                    <i class=" fas fa-store"></i>
                    <span>Profil</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php endif; ?>

        </ul>