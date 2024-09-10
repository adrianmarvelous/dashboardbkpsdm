<?php 
require_once '../../koneksi.php';

session_start();

if(htmlentities(isset($_POST['submit']))){

    if ($_POST['captcha_code'] == $_SESSION['captcha_code']) {

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $tahun = htmlentities($_POST['tahun']);

    $admin = $db->prepare('SELECT nip, password FROM user_master_asn WHERE nip = :username');
    $admin->execute(array(
        ':username' => $_POST['username']
    ));

    $query_tenaga_kontrak = $db->prepare("SELECT nik, password, nama, ganti_password FROM tenaga_kontrak_master WHERE nik = :username");
    $query_tenaga_kontrak->execute(array(
        ':username' => $_POST['username']
    ));
    $query_tenaga_kontrak->execute();
    $check_pass_tenaga_kontrak = $query_tenaga_kontrak->fetch(PDO::FETCH_ASSOC);

    if($admin->rowCount() != 0){
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
                    if($hash_pass['id_bidang'] == 5 & $hash_pass['role'] == "bendahara"){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../login_user/bendahara/index.php'</script>";
                    }elseif($hash_pass['id_bidang'] == 5 & $hash_pass['role'] == "pengadministrasi keuangan"){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../login_user/pengadministrasi_keuangan/index.php'</script>";
                    }elseif($hash_pass['id_bidang'] == 5 & $hash_pass['role'] == "ppkskpd"){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../login_user/ppkskpd/index.php'</script>";

                    }elseif($hash_pass['id_bidang'] == 5 & $hash_pass['role'] == "kepala badan"){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../login_user/pa/index.php'</script>";
                    }elseif($hash_pass['role'] == "pptk"){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../login_user/pptk/index.php'</script>";
                    }elseif($hash_pass['id_bidang'] == 0){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../tpp/client/index.php'</script>";
                    }elseif($hash_pass['role'] == 'pembuat spj' || $hash_pass['role'] == 'pejabat pengadaan'){
                        $_SESSION['nama'] = $hash_pass['nama'];
                        $_SESSION['nip'] = $hash_pass['nip'];
                        $_SESSION['id_bidang'] = $hash_pass['id_bidang'];
                        $_SESSION['role'] = $hash_pass['role'];
                        $_SESSION['username'] = $hash_pass['nip'];
                        $_SESSION['tahun'] = $tahun;
                        echo "<script>window.location='../../index.php'</script>";
                    }
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
    else{
            //echo "<script>alert('username belum terdaftar');history.go(-1)</script>";
        $percobaan = htmlentities($_POST['percobaan']);
        header('Location: ../../login_system/login.php?percobaan='.$percobaan.'&status=password_salah');
    }
    
    }else{
        echo "<script>alert('Login gagal! Capctha tidak sesuai!')</script>";
        header('Location: ../../login_system/login.php?percobaan='.$percobaan.'&status=captcha_salah');
    }

}
?>