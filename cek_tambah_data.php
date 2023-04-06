<?php
    // mulai session
    session_start();

    // menghubungkan dengan koneksi
    include 'koneksi.php';

    //cek status login
    if(!isset($_SESSION['status'])){
        header("location:login.php?pesan=belum_login");
    }
    
    // mengambil data yang dikirim dari form
    $jenis_zakat = $_POST['jenis_zakat'];
    $nominal = $_POST['nominal'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $nama_bank = $_POST['nama_bank'];
    $no_rek = $_POST['no_rek'];

    // mengambil data id admin
    $id_admin = $_SESSION['id_admin'];

    //pengambilan id zakat dari jenis zakat
    $zakat = "SELECT `id_zakat` FROM `tb_zakat` WHERE `jenis_zakat`='$jenis_zakat'";
    if ($res = mysqli_query($koneksi, $zakat)) { 
		if (mysqli_num_rows($res) > 0) { 
			while ($row = mysqli_fetch_array($res)) { 
                $id_zakat = $row['id_zakat'];
			}
		}
		else { 
			echo "No matching records are found."; 
		}
	} 
	else { 
		echo "ERROR: Could not able to execute $sql. "
									.mysqli_error($link); 
    }

    $sql = "INSERT INTO `tb_pembayaran_zakat`(
        `id_pembayaran`, 
        `id_admin`, 
        `id_zakat`, 
        `nominal`, 
        `nama_lengkap`, 
        `no_hp`, 
        `alamat_email`, 
        `nama_bank`, 
        `no_rekening`) 
        VALUES (
            0,
            '$id_admin',
            '$id_zakat',
            '$nominal',
            '$nama_lengkap',
            '$no_hp',
            '$email',
            '$nama_bank',
            '$no_rek'
        )";

    if (mysqli_query($koneksi, $sql)) { 
        header("location:add_data.php?pesan=berhasil_tambah_data");
    }else{ 
        header("location:add_data.php?pesan=gagal_tambah_data");
    } 

    mysqli_close($koneksi); 

?>