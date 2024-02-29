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
<h1 class="margin-bottom:50px;">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
                <br><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>   
                            <th width="29%">Aksi</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user = " . $_SESSION['user']['id_user']);
                        while ($data = mysqli_fetch_array($query)) {
                            $tgl_peminjam = $data['tanggal_peminjaman'];
                            $tgl_pengembalian = $data['tanggal_pengembalian'];
                            $status = $data['status_peminjaman'];
                        
                            // Periksa apakah buku sudah disimpan dalam koleksi pribadi
                            $query_check_collection = mysqli_query($koneksi, "SELECT * FROM koleksipribadi WHERE id_user = ".$_SESSION['user']['id_user']." AND id_buku = ".$data['id_buku']);
                            $is_in_collection = mysqli_num_rows($query_check_collection) > 0;
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?= date('d F Y',strtotime($tgl_peminjam)) ?></td>
                                <td><?=  date('d F Y',strtotime($tgl_pengembalian)) ?></td>
                                <td><?=$status?></td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="?page=peminjaman_ubah&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-warning" style=" border-radius: 20px;"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                        </div>
                                        <div class="col">
                                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger" style=" border-radius: 20px;"><i class="fa-solid fa-trash"></i>Delete</a>
                                        </div>
                                        <div class="col">
                                            <?php
                                            if ($is_in_collection) {
                                                echo '<span class="btn btn-success" style="border-radius: 20px;"><i class="fa-solid fa-check"></i>Tersimpan</span>';
                                            } else {
                                                ?>
                                                <form method="post" action="simpan_koleksi.php" style="">
                                                    <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">
                                                    <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
                                                    <button type="submit" name="simpan" class="btn btn-success" style="border-radius: 20px;" onclick="return confirm('Apakah anda yakin menyimpan data ini?');"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
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