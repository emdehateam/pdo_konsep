<?php
// session start
if(!empty($_SESSION)){ }else{ session_start(); }
//session
if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
// panggil file
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
</head>
<body>
        <div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
			<div class="float-right">	
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Tambah Pengguna</h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses crud dengan paramater get aksi tambah -->
							<form action="proses/crud.php?aksi=tambah" method="POST">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" value="" class="form-control" name="nama" required>
								</div>
								<div class="form-group">
									<label>Telepon</label>
									<input type="number" value="" class="form-control" name="telepon" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="harga" value="" class="form-control" name="email" required>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" required></textarea>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" value="" class="form-control" name="user" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" value="" class="form-control" name="pass" required>
								</div>
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
    
</body>
</html>