<?php 
// session start
if(!empty($_SESSION)){ }else{ session_start(); }
//session
if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
// panggil file
require 'proses/panggil.php';

// tampilkan form edit
$idGet = strip_tags($_GET['id_artikel']);
$hasil = $proses->tampil_data_artikel('tbl_artikel','id_artikel',$idGet);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
	p{
		text-align: justify;
	}
	h6{
		font-size: 12px;
		text-align: right;
		color: gray;
	}
</style>
<body style="background:#ecf0f1;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
			<div class="float-right">	
				<a href="artikel.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-lg-16">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title text-center mt-2"><?php echo $hasil['judul'];?></h4>
						</div>
						<div class="card-body">
							<?php
 
							// membaca input dari form
							$input = $hasil['konten'];
							
							// memecah string input berdasarkan karakter '\r\n\r\n'
							$pecah = explode("\r\n\r\n", $input);
							
							// string kosong inisialisasi
							$text = "";
							
							// untuk setiap substring hasil pecahan, sisipkan <p> di awal dan </p> di akhir
							// lalu menggabungnya menjadi satu string utuh $text
							for ($i=0; $i<=count($pecah)-1; $i++)
							{
								$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
								$text .= $part;
							}
							
							
							?>
							<p><?php echo $text?></p>
						
						</div>
						<div class="card-footer">
							<h6><?php echo "Ditulis oleh "."<i>".$hasil['createdby']."</i>"." "."pada: ".$hasil['created_date'];?></h6>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
</body>
</html>