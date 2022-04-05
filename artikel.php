<?php 
// session start
if(!empty($_SESSION)){ }else{ session_start(); }
require 'proses/panggil.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    th{
        font-size: 12px;
        text-align:center;
        padding: 0%;
        margin: -2px;
    }
</style>
<body>
    <div class="container">
        
		<div class="row">
			<div class="col-lg-14">

                <?php if(!empty($_SESSION['ADMIN'])){?>
                <br/>
                <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
                <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                <br/><br/>
                <a href="#tambahartikel" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                    <br/><br/>
                    <div class="card">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
                                <ul class="navbar-nav ml-auto text-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Index</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mx-auto my-2 order-0 order-md-1 position-relative">
                                <a class="mx-auto" href="#">
                                    <img src="img/undraw_rocket.svg" class="rounded-circle">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse w-100 dual-collapse2 order-2 order-md-2">
                                <ul class="navbar-nav mr-auto text-center">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="artikel.php">Artikel</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="card-header">
                            <h4 class="card-title">Artikel</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Artikel ID</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Gambar</th>
                                        <th>Di Tulis Oleh</th>
                                        <th>Tgl Publish</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        function limit_text($text, $limit) {
                                            if (str_word_count($text, 0) > $limit) {
                                                $words = str_word_count($text, 2);
                                                $pos   = array_keys($words);
                                                $text  = substr($text, 0, $pos[$limit]) . '...';
                                            }
                                            return $text;
                                        }
                                        ?>
                                <?php
                                    $no=1;
                                    $hasil = $proses->tampil_artikel('tbl_artikel');
                                    foreach($hasil as $isi){
                                ?>
                                <?php 
                                
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $isi['id_artikel'];?></td>
                                        <td><?php echo $isi['judul']?></td>
                                        
                                        <td><?= limit_text($isi['konten'], 15); ?></td>
                                        <td>
                                            <img src="<?php echo $isi['img'];?>" alt="">
                                        </td>
                                        <td><?php echo $isi['createdby'];?></td>
                                        <td><?php echo $isi['created_date'];?></td>
                                        
                                        <td style="text-align: center; padding: 2px;" class="d-flex m-2">
                                            <a href="lihat_artikel.php?id_artikel=<?php echo $isi['id_artikel'];?>" 
                                            class="btn btn-info btn-md"><span class="fa fa-eye"></span></a>
                                            <a href="edit.php?id=<?php echo $isi['id_login'];?>" class="btn btn-success btn-md">
                                            <span class="fa fa-edit"></span></a>
                                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="proses/crud.php?aksi=hapus&hapusid=<?php echo $isi['id_login'];?>" 
                                            class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>

                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php }else{?>
                        <br/>
                        <div class="alert alert-info">
                            <h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3>
                            <hr/>
                            <p><a href="login.php">Login Disini</a></p>
                        </div>
                    <?php }?>
			    </div>
            </div>
		</div>
	</div>
    
</body>
<script>
    $('#mytable').dataTable();
</script>
</html>