        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/shards/') ?>images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Raja Vapor</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
         
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url_halaman('index.php?halaman=beranda') ?>">
                  <i class="material-icons">speed</i>
                  <span>Beranda</span>
                </a>
              </li>

              <?php
              if ($_SESSION['hakakses'] == 1) { ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=gerai') ?>">
                    <i class="material-icons">store</i>
                    <span>Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=kategori') ?>">
                    <i class="material-icons">category</i>
                    <span>Kategori</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url_halaman('index.php?halaman=produk') ?>">
                    <i class="material-icons">inventory</i>
                    <span>produk</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('vapor/index.php?halaman=pembayaran') ?>">
                    <i class="material-icons">payment</i>
                    <span>Pembayaran</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pengiriman') ?>">
                    <i class="material-icons">airport_shuttle</i>
                    <span>Pengiriman</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pengguna') ?>">
                    <i class="material-icons">group</i>
                    <span>Pengguna</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=stok_gerai') ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Stok Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pesanan_stok_gerai') ?>">
                    <i class="material-icons">speaker_notes</i>
                    <span>Pesan Stok Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pesanan_stok') ?>">
                    <i class="material-icons">speaker_notes</i>
                    <span>Pesan Stok</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=penjualan_gerai') ?>">
                    <i class="material-icons">receipt_long</i>
                    <span>Penjualan Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=laporan') ?>">
                    <i class="material-icons">assessment</i>
                    <span>Laporan</span>
                  </a>
                </li>

              <?php
              } elseif ($_SESSION['hakakses'] == 2) { ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=gerai') ?>">
                    <i class="material-icons">store</i>
                    <span>Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=kategori') ?>">
                    <i class="material-icons">category</i>
                    <span>Kategori</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url_halaman('index.php?halaman=produk') ?>">
                    <i class="material-icons">inventory</i>
                    <span>produk</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pembayaran') ?>">
                    <i class="material-icons">payment</i>
                    <span>Pembayaran</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pengiriman') ?>">
                    <i class="material-icons">airport_shuttle</i>
                    <span>Pengiriman</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pengguna') ?>">
                    <i class="material-icons">group</i>
                    <span>Pengguna</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=stok_gerai') ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Stok Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pesanan_stok_gerai') ?>">
                    <i class="material-icons">speaker_notes</i>
                    <span>Pesan Stok Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pesanan_stok') ?>">
                    <i class="material-icons">speaker_notes</i>
                    <span>Pesan Stok</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=penjualan_gerai') ?>">
                    <i class="material-icons">receipt_long</i>
                    <span>Penjualan Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=laporan') ?>">
                    <i class="material-icons">assessment</i>
                    <span>Laporan</span>
                  </a>
                </li>

              <?php
              } elseif ($_SESSION['hakakses'] == 3) { ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=stok_gerai') ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Stok Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=pesanan_stok_gerai') ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Pesan Stok Gerai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?= base_url_halaman('index.php?halaman=penjualan_gerai') ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Penjualan Gerai</span>
                  </a>
                </li>

              <?php
              } elseif ($_SESSION['hakakses'] == 4) { ?>

              <?php
              }
              ?>
        
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      <span class="badge badge-pill badge-danger">2</span>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE6E1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Pesanan Gerai</span>
                        <p>Your website’s active users count increased by
                          <span class="text-success text-semibold">28%</span> in the last week. Great job!
                        </p>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE8D1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Pembayaran</span>
                        <p>Last week your store’s sales count decreased by
                          <span class="text-danger text-semibold">5.52%</span>. It could have been worse!
                        </p>
                      </div>
                    </a>
                    <a class="dropdown-item notification__all text-center" href="#">Tampil semua pesanan</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/shards/') ?>images/avatars/1.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?= $_SESSION['nama_lengkap'] ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="http://localhost/201753028/logout.php">
                      <i class="material-icons text-danger">&#xE879;</i> Logout 
                    </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->