<?php 
require_once '../../koneksi.php';
error_reporting(0);
$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);
$password_baru = htmlentities($_POST['password_baru']);
$password_konfirmasi = htmlentities($_POST['password_konfirmasi']);

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password_baru);
$lowercase = preg_match('@[a-z]@', $password_baru);
$number    = preg_match('@[0-9]@', $password_baru);
$specialChars = preg_match('@[^\w]@', $password_baru);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_baru) < 8) {
  echo "<script>alert('Password harus mengandung 8 Karakter dan harus mengandung huruf kapital, angka, dan spesial karakter.');history.go(-1)</script>";
}
else{
  //echo 'Strong password.';
  $check_query = $db->prepare("SELECT nik, password, ganti_password FROM tenaga_kontrak_master WHERE nik = :username");
  $check_query->bindParam(':username',$username);
  $check_query->execute();
  $check = $check_query->fetch(PDO::FETCH_ASSOC);

  //if($check['password'] == $password){
    if($password_baru == $password_konfirmasi){
      $options = [
        'cost' => 11
      ];
      $insert_pass_baru = $db->prepare("UPDATE tenaga_kontrak_master SET password = :password_baru, ganti_password = 1 WHERE nik = :username");
            //$insert_pass_baru->bindParam(':password_baru',$password_baru);
      $insert_pass_baru->bindParam(':password_baru',password_hash($password_baru, PASSWORD_BCRYPT, $options));
      $insert_pass_baru->bindParam(':username',$username);
      $insert_pass_baru->execute();

      echo "<script>window.location='../../login_system/login.php'</script>";
    }
    else{
      echo "<script>alert('Konfirmasi Password Salah');history.go(-1)</script>";
    }
  //}
    /*if (password_verify($password, $check['password'])){
        if($password_baru == $password_konfirmasi){
            $options = [
              'cost' => 11
          ];
          $insert_pass_baru = $db->prepare("UPDATE user_master_asn SET password = :password_baru, ganti_password = 1 WHERE nip = :username");
          $insert_pass_baru->bindParam(':password_baru',password_hash($password_baru, PASSWORD_BCRYPT, $options));
          $insert_pass_baru->bindParam(':username',$username);
          $insert_pass_baru->execute();
          echo "<script>window.location='../../login_system/login.php'</script>";
      }
      else{
        echo "<script>alert('Konfirmasi Password Salah');history.go(-1)</script>";
    }
  }*/
  /*else{
    echo "<script>alert('Password Salah');history.go(-1)</script>";
  }*/
}
?>