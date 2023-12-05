       <!-- Topbar -->
       <!-- bg untuk warna navbar, navbar-light biar ikon notif warna putih, kalau dihapus otomatis biru -->
       <nav class="navbar navbar-expand  navbar-light bg-light topbar mb-2 static-top shadow">


           <!-- Topbar Navbar -->
           <ul class="navbar-nav ml-auto">
               <?php if ($this->session->login['status'] == 'karyawan') : ?>
                   <!-- Nav Item - Alerts -->
                   <li class="nav-item dropdown no-arrow mx-1">
                       <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-bell"></i>
                           <?php
                            $conn = mysqli_connect("localhost", "root", "", "db_tanitangahsawah");

                            $rop = mysqli_query($conn, "SELECT COUNT * AS 'rop' FROM barang WHERE stok_barang <= rop");
                            ?>
                           <!-- Counter - Alerts -->
                           <span class="badge badge-danger badge-counter"><?= $rop ?><b>!!!</b></span>
                       </a>
                       <ul class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                           <li>
                               <div class="dropdown-header text-center">Pemberitahuan</div>
                           </li>
                           <?php
                            $conn = mysqli_connect("localhost", "root", "", "db_tanitangahsawah");
                            $ambildatastok = mysqli_query($conn, "SELECT * FROM barang WHERE stok_barang <= rop ORDER BY barang_id DESC");

                            while ($fetch = mysqli_fetch_array($ambildatastok)) {
                                $namabarang = $fetch['nama_barang'];
                                $stok_barang = $fetch['stok_barang'];
                                $rop = $fetch['rop'];
                            ?>
                               <li>
                                   <a href="<?= base_url('pembelian/tambah') ?>">
                                       <a class="text-gray-800" href="<?= base_url('pembelian/tambah') ?>">
                                           Barang <?= $namabarang ?> harus dipesan kembali.
                                           (Stok: <?= $stok_barang ?>, ROP: <?= $rop ?>)
                                       </a>
                                   </a>
                               </li>
                           <?php
                            }
                            ?>
                       </ul>
                   </li>


                   <div class="topbar-divider d-none d-sm-block"></div>
               <?php endif; ?>

               <!-- Nav Item - User Information -->
               <li class="nav-item dropdown no-arrow">
                   <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <!-- Menampilkan nama user yang login -->
                       <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->login['username'] ?></span>
                   </a>

                   <!-- Dropdown - User Information -->
                   <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                       <a class="dropdown-item" href="<?= base_url('logout') ?>">
                           <i class=" fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           Logout
                       </a>
                   </div>
               </li>
           </ul>

       </nav>
       <!-- End of Topbar -->