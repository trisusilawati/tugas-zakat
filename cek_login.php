<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from tb_admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$sql = "SELECT id_admin FROM `tb_admin` WHERE username='$username'";
	$id_admin;
	
	$_SESSION['username'] = $username;

	if ($res = mysqli_query($koneksi, $sql)) { 
		if (mysqli_num_rows($res) > 0) { 
			while ($row = mysqli_fetch_array($res)) { 
				$id_admin = $row['id_admin'];
			}
		}
		else { 
			echo "No matching records are found."; 
		}
	} 
	else { 
		echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
	}
	$_SESSION['id_admin'] = $id_admin;
	$_SESSION['status'] = "login";
	header("location:index.php");
}else{
	header("location:login.php?pesan=gagal");
}

?>