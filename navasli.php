  <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav bg-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="?">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney"></i></div>
                                Dashboard
                            </a>
                            <div style="color:blue" class="sb-sidenav-menu-heading">Navigasi</div>
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <?php
                                }else{
                                    ?>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a>
                            <a class="nav-link" href="?page=koleksi_pribadi">
                                <div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
                                Koleksi Pribadi 
                            </a>
                            <?php
                                }
                                ?>
                            <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments"></i></div>
                                Ulasan
                            </a>
                            
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                                <a class="nav-link" href="?page=laporan">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-print"></i></div>
                                    Laporan Peminjaman
                                </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?php echo $_SESSION['user']['nama']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php

                            $page = isset($_GET['page']) ? $_GET['page'] :'home';
                            if(file_exists($page . '.php')){
                                include $page . '.php';
                            }else{
                                include '404.php';
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-info mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">
                                Copyright &copy; Perpustakaan Digital 2024
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>