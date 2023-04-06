<!DOCTYPE html>
<head>
    <title>Menu Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
            echo "<script type='text/javascript'>alert('Login gagal! username dan password salah!');</script>";
		}else if($_GET['pesan'] == "logout"){
            echo "<script type='text/javascript'>alert('Anda telah berhasil logout');</script>";
			echo "";
		}else if($_GET['pesan'] == "belum_login"){
            // echo "<script type='text/javascript'>alert('Anda harus login untuk mengakses halaman admin');</script>";
		}
	}
    ?>
    <div class="menu-login">
        <div class="col-6 col-sm-4 offset-sm-4 bg-primary" style="margin-top: 50px; margin-left: 30%">
            <h2 class="text-center text-white" style="padding: 15px 15px 15px 15px;">
            Form Login
            </h2>
        </div>
        <div class="form">
            <div class="col-6 col-sm-4 offset-sm-4 bg-secondary" style="padding: 20px 20px 20px 20px; margin-left: 30%">
                <form method="post" action="cek_login.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control " placeholder="Masukan Password" name="password" required>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" id="button-login" name="button-login" class="btn btn-primary center-block" style="min-width: 100px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>