<?php 
// session start();
if(!empty($_SESSION)){ }else{ session_start(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <br/><br/>
                <div id="logout">
                    <?php if(isset($_GET['signout'])){?>
                        <div class="alert alert-success">
                            <small>Anda Berhasil Logout</small>
                        </div>
                    <?php }?>
                </div>
                <div id="notifikasi">
                    <div class="alert alert-danger">
                        <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sign in</h4>
                    </div>
                    <div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses login dengan paramater get aksi login -->
                        <form method="post" action="proses/crud.php?aksi=login" id="formlogin">
                        <div class="form-group">
                            <label>Your username</label>
                            <input name="user" class="form-control" placeholder="user" type="text" required="required" autocomplete="off">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <label>Your password</label>
                            <input name="pass" class="form-control" placeholder="******" type="password" required="required" autocomplete="off">
                        </div> <!-- form-group// --> 
                        <div class="form-group">
                            <button type="submit" name="proses_login" class="btn btn-primary btn-block"> Login  </button>
                        </div> <!-- form-group// -->                                                           
                    </form>
                        <div class="form-group">
                            <a href="index.php"> Kembali ke Home  </a>
                        </div> <!-- form-group//-->
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div> 
    </div>
</body>
<script>
    // notifikasi gagal di hide
    <?php if(empty($_GET['get'])){?>
        $("#notifikasi").hide();
    <?php }?>
    var logingagal = function(){
        $("#logout").fadeOut('slow');
        $("#notifikasi").fadeOut('slow');
    };
    setTimeout(logingagal, 4000);
</script>
</html>