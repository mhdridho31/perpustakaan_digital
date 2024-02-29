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
<h1 class="margin-bottom:50px;">Koleksi Pribadi</h1>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <br>
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th width="18%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                            $i = 1;
                            // Assuming you have initialized $koneksi somewhere
                            $query = mysqli_query($koneksi, "SELECT koleksipribadi.id_koleksi, buku.judul, buku.penulis, buku.penerbit 
                                                            FROM koleksipribadi 
                                                            LEFT JOIN buku ON koleksipribadi.id_buku = buku.id_buku");

                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['penulis']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td>
                                        
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=koleksi_pribadi_hapus&&id=<?php echo $data['id_koleksi']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</a>
                                        
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>