<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
        body {
            
            background-size: cover;
            background-repeat: no-repeat;
        }
        .kiri {
            margin-left: 15%;
        }
        h1 {
            color:white;
        }
    </style>
    </head>
    <body>
<h1 class="margin-bottom:50px;">Laporan Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
                <br>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>           
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                        while($data =mysqli_fetch_array($query)){
                            $tglpengembalian = $data['tanggal_pengembalian'];
                            $tglpeminjaman = $data['tanggal_peminjaman'];
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?= date("d F Y", strtotime($tglpeminjaman)) ?></td>
                                <td><?= date("d F Y", strtotime($tglpengembalian)) ?></td>
                                <td><?php echo $data['status_peminjaman']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>  
        </div>
    </div>
 </div>
</body>
</html>