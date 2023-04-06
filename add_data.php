<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Zakat</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- cek apakah sudah login -->
    <?php 
    include 'koneksi.php';
    session_start();
    
    //cek status login
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
    }

    //cek notifikasi
    if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "berhasil_tambah_data"){
            echo "<script type='text/javascript'>alert('Berhasil Menambahkan Data');</script>";
        }else if($_GET['pesan'] == 'gagal_tambah_data'){
            echo "<script type='text/javascript'>alert('Gagal Menambahkan Data');</script>";
        }
    }
    
	?>

        <div id="wrapper" class="active">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
            <li class="sidebar-brand"><img class="img-thumbnail" src="assets/img/logo.png" alt="" style="width: 100px; height: 100px; margin-top:10px;border-radius: 20px 20px 20px 20px;"></li>
        </ul>
        <ul id="sidebar_menu" class="sidebar-nav" style="margin-top: 60px;">
            <li class="sidebar-brand"><a id="menu-toggle" href="index.php">Beranda<span id="main_icon"></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">     
            <li><a href="add_data.php">Tambah Data Zakat</a></li>
            <li><a href="list_data.php">Data Zakat</a></li>
            <li><a href="logout.php">Keluar</a></li>
        </ul>
        </div>
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
                <div class="col-md-12">
                <p class="well lead" style="margin-top: 10px;">Tambah Data Zakat</p>
                
                <div class="col-1 col-sm-8 bg-secondary" style="margin-bottom: 50px;">
                    <form method="post" action="cek_tambah_data.php">
                        <div class="form-group">
                            <label for="jenis_zakat">Jenis Zakat</label>
                            <select name="jenis_zakat" id="jenis_zakat" class="form-control" required>
                                <option value=""> <-- Masukan Pilihan --> </option>
                                <?php 
                                $sql=mysqli_query($koneksi, "SELECT * FROM tb_zakat");
                                while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?=$data['jenis_zakat']?>"><?=$data['jenis_zakat']?></option> 
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" placeholder="Masukan Nominal" name="nominal" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Telepon</label>
                            <input type="number" class="form-control" placeholder="Masukan Nomor Telepon" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control" placeholder="Masukan Alamat Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Bank" name="nama_bank" required>
                        </div>
                        <div class="form-group">
                            <label for="no_rek">Nomor Rekening</label>
                            <input type="number" class="form-control" placeholder="Masukan Nomor Rekening" name="no_rek" required>
                        </div>
                        <div>
                            <input type="submit" id="button-login" name="button-login" class="btn btn-primary" style="min-width: 100px;">
                            <input type="reset" value="Batal" id="button-login" name="button-login" class="btn btn-primary" style="min-width: 100px;">
                        </div>
                        
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
</body>
</html>