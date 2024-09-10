<?php
ini_set('display_errors', 1);
error_reporting(~0);
require("../config/koneksi.php");

$login_status = $login->cek_login();
if($login_status){
	if ($_SESSION['role_login'] == 'ASN') {
		/*if($_SESSION['ganti_password'] == 0){
			include 'ganti_password.php';
		}
		else{*/
			if($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "bendahara"){
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "pengadministrasi keuangan"){
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "ppkskpd"){
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "kepala badan"){
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['role'] == "pptk"){
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 0){
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['role'] == 'pembuat spj' || $_SESSION['role'] == 'pengadministrasi'){
				echo "<script>window.location='../index.php'</script>";
			}
		//}
	}
	if ($_SESSION['role_login'] == 'OS'){
		/*if($_SESSION['ganti_password'] == 0){
			echo "<script>window.location='ganti_password_tenaga_kontrak.php'</script>";
		}
		else{*/
				echo "<script>window.location='../index.php'</script>";
		//}
	}elseif($_SESSION['role_login'] == 'super_admin'){
		echo "<script>window.location='../index.php'</script>";
	}elseif($_SESSION['role_login'] == 'admin'){
		echo "<script>window.location='../index.php'</script>";
	}elseif($_SESSION['role_login'] == 'admin_dashboard'){
		echo "<script>window.location='../index.php'</script>";
	}
	elseif($_SESSION['role_login'] == 'auditor'){
		echo "<script>window.location='../index.php'</script>";
	}

}
else{
	//include form log in jika belum log in
	// include "login_tahun.php";
	include "login_tahun_baru.php";
}
?>