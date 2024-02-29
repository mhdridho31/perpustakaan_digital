<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan Digital</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.php"><marquee>Perpustakaan Online</marquee></a>
                
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                        <div class="nav" style="margin-left: 100px;">
                            <a class="nav-link" href="?">
                                <i class="fa-solid fa-house-chimney" style="color: white;"></i>
                               <color-white>Dashboard
                            </a>
                          
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                            <a class="nav-link" href="?page=kategori">
                                <i class="fa-solid fa-table-list" style="color: white;"></i>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <i class="fas fa-book" style="color: white;"></i>
                                Buku
                            </a>
                            <?php
                                }else{
                                    ?>
                            <a class="nav-link" href="?page=peminjaman">
                                <i class="fas fa-book-open" style="color: white;"></i>
                                Peminjaman
                            </a>
                            <a class="nav-link" href="?page=koleksi_pribadi">
                                <i class="fas fa-industry" style="color: white;"></i>
                                Koleksi Pribadi 
                            </a>
                            <?php
                                }
                                ?>
                            <a class="nav-link" href="?page=ulasan">
                                <i class="fa-solid fa-comments" style="color: white;"></i>
                                Ulasan
                            </a>
                            
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                                <a class="nav-link" href="?page=laporan">
                                    <i class="fa-solid fa-print" style="color: white;"></i>
                                    Laporan Pinjam
                                </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="logout.php">
                                <i class="fa fa-power-off" style="color: white;"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer"style="margin-left: 100px; color:white;">
                        <div class="small">Sebagai:
                       <?php echo $_SESSION['user']['nama']; ?>
                    </div>
                </div>
                </nav>
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
                <footer class="py-4 bg-dark" style="margin-top:270px">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">
                                Copyright &copy; Perpustakaan Digital 2024
                            </div>
                        </div>
                    </div>
                </footer>
          
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
