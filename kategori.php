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
    <h1 style="margin-bottom:50px;">Kategori Buku</h1>
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=kategori_tambah" class="btn btn-primary">+ Tambah Data</a>
                <br>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM kategori");
                        while($data =mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['kategori']; ?></td>
                                <td>
                                    <a href="?page=kategori_ubah&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-warning mb-3"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger mb-3"><i class="fa-solid fa-trash"></i>Delete</a>
                                </td>
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