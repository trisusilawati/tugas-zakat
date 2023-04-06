<?php
// mulai session
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

//cek status login
if(!isset($_SESSION['status'])){
    header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Zakat</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    
    //cek notifikasi
    if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "berhasil_hapus_data"){
            echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
        }else if($_GET['pesan'] == 'gagal_hapus_data'){
            echo "<script type='text/javascript'>alert('Gagal Menghapus Data');</script>";
        }else if($_GET['pesan'] == 'berhasil_ubah_data'){
            echo "<script type='text/javascript'>alert('Berhasil Mengubah Data');</script>";
        }else if($_GET['pesan'] == 'gagal_ubah_data'){
            echo "<script type='text/javascript'>alert('Gagal Mengubah Data');</script>";
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
            <div class="row>
                <div class="col-md-12">
                    <p class="well lead">Data Zakat</p>
                </div>
            </div>
            <div class="row" style="margin-left: 8px;">
                <div class="col-md-12">
                    <button class='btn btn-primary glyphicon glyphicon-print' onclick="location.href='print_data.php'"> Cetak</button>
                </div>
            </div>
            
            <div id="data_zakat" style='margin: 20px 20px 20px 20px;'>
                <?php
                $sql = "SELECT * FROM `tb_pembayaran_zakat` INNER JOIN tb_zakat WHERE tb_pembayaran_zakat.id_zakat = tb_zakat.id_zakat"; 
                $i = 1;
                if ($res = mysqli_query($koneksi, $sql)) { 
                    if (mysqli_num_rows($res) > 0) { 
                        echo "<table class='table table-striped'>"; 
                        echo "<thead><tr class='bg-primary'; text-light'>"; 
                        echo "<th scope='col' style='max-width: 30px;'>No.</th>"; 
                        echo "<th scope='col' style='max-width: 150px;'>Jenis Zakat</th>"; 
                        echo "<th scope='col' style='max-width: 150px;'>Nominal</th>"; 
                        echo "<th scope='col' style='max-width: 150px;'>Nama Lengkap</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Nomor HP</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Email</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Nama Bank</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Nomor Rekening</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Edit</th>";
                        echo "</thead></tr>"; 
                        while ($row = mysqli_fetch_array($res)) { 
                            echo "<tbody><tr>";
                            echo "<th scope='row'>$i</th>"; 
                            echo "<td>".$row['jenis_zakat']."</td>";
                            echo "<td>Rp. ".number_format($row['nominal'],2)."</td>";
                            echo "<td>".$row['nama_lengkap']."</td>";
                            echo "<td>".$row['no_hp']."</td>";
                            echo "<td>".$row['alamat_email']."</td>";
                            echo "<td>".$row['nama_bank']."</td>";
                            echo "<td>".$row['no_rekening']."</td>";
                            $i++;
                            ?>
                            <td>
                            <button class='btn btn-info glyphicon glyphicon-edit' onclick="location.href='edit_data.php?id=<?php echo $row['id_pembayaran'] ?>'">Ubah</button>
                            <button class='btn btn-danger glyphicon glyphicon-trash' onclick="location.href='hapus_data.php?id=<?php echo $row['id_pembayaran'] ?>'">Hapus</button>
                            </td>
                            </tbody></th></tr>
                        <?php }
                        echo "</table>"; 
                    } 
                    else { 
                        echo "Belum Ada Data"; 
                    } 
                } 
                else { 
                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($koneksi); 
                } 

                ?>
            </div>
        </div>
    </div>


</body>
</html>