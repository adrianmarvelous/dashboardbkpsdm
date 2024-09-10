<?php 
ini_set('display_errors', 1);
error_reporting(~0);
require_once '../config/koneksi.php';

// session_start();

if(htmlentities(isset($_POST['submit']))){

    // if ($_POST['captcha_code'] == $_SESSION['captcha_code']) {

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $tahun = htmlentities($_POST['tahun']);

    $asn = $db->prepare('SELECT nip, password FROM user_master_asn WHERE nip = :username');
    $asn->execute(array(
        ':username' => $_POST['username']
    ));

    $query_tenaga_kontrak = $db->prepare("SELECT nik, password, nama, ganti_password FROM tenaga_kontrak_master WHERE nik = :username");
    $query_tenaga_kontrak->execute(array(
        ':username' => $_POST['username']
    ));
    $query_tenaga_kontrak->execute();
    $check_pass_tenaga_kontrak = $query_tenaga_kontrak->fetch(PDO::FETCH_ASSOC);

    $query_admin = $db->prepare("SELECT * FROM user_admin WHERE username = :username");
    $query_admin->bindParam(':username',$username);
    $query_admin->execute();
    $admin = $query_admin->fetch(PDO::FETCH_ASSOC);
    // $admin->rowCount();

    if($asn->rowCount() > 0){
        //if($check != 0){
        $check_pass_ = $db->prepare('SELECT nip, password, nama, role, ganti_password, id_bidang FROM user_master_asn WHERE nip = :username');

        $check_pass_->execute(array(
            ':username' => $_POST['username']
        ));
        $check_pass_->execute();
        $hash_pass = $check_pass_->fetch(PDO::FETCH_ASSOC);

        if(htmlentities(!empty($hash_pass['nip']))){
            //if($password == $hash_pass['password']){
            if($hash_pass['ganti_password'] == 0){
                    //echo "<script>window.location='../../login_system/ganti_password.php'</script>";
                    //header("Location: ../../login_system/ganti_password.php");
                include '../../login_system/ganti_password.php';
            }
            else{
                if (password_verify($password, $hash_pass['password'])) {
                    $_SESSION['nama'] = $hash_pass['nama'];
                    $_SESSION['nip'] = $hash_pass['nip'];
                    echo "<script>window.location='../index.php'</script>";
                }
                else{
               //echo "<script>alert('Password salah');history.go(-1)</script>";
                    $percobaan = htmlentities($_POST['percobaan']);
                    header('Location: ../../login_system/login.php?percobaan='.$percobaan.'&status=password_salah');
                }
            }
        }
        
    }
    elseif($query_tenaga_kontrak-> rowCount() != 0){
        if ($check_pass_tenaga_kontrak['ganti_password'] == 0) {
            include '../../login_system/ganti_password_tenaga_kontrak.php';
        }
        else{
            if (password_verify($password, $check_pass_tenaga_kontrak['password'])) {
                $_SESSION['nama'] = $check_pass_tenaga_kontrak['nama'];
                $_SESSION['nik'] = $check_pass_tenaga_kontrak['nik'];
                $_SESSION['tahun'] = $tahun;
                header('Location: ../../tenaga_kontrak/tenaga_kontrak_approve/index.php');
            }
            else{
                $percobaan = htmlentities($_POST['percobaan']);
                header('Location: ../../login_system/login.php?percobaan='.$percobaan.'&status=password_salah');
            }
        }
    }
    elseif($query_admin->rowCount() != 0){
        if (password_verify($password, $admin['password'])) {
            $_SESSION['nama'] = $admin['nama'];
            $_SESSION['tahun'] = $tahun;
            $_SESSION['admin'] = 'true';
            echo "<script>window.location='../index.php'</script>";
        }
    }
    else{
            //echo "<script>alert('username belum terdaftar');history.go(-1)</script>";
        $percobaan = htmlentities($_POST['percobaan']);
        header('Location: ../../login_system/login.php?percobaan='.$percobaan.'&status=password_salah');
    }
    
    }else{
        echo "<script>alert('Login gagal! Capctha tidak sesuai!')</script>";
        header('Location: ../../login_system/login.php?percobaan='.$percobaan.'&status=captcha_salah');
    // }

}
?>