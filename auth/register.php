<?php 
    require_once '../../koneksi.php';

    if(htmlentities(isset($_POST['submit']))){
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $password1 = htmlentities($_POST['password1']);
        $check_username = $db->prepare("SELECT username FROM user_admin WHERE username = :username");
        $check_username->bindParam(':username',$username);
        $check_username->execute();
        if( $check_username->rowCount() > 0){
            echo "<script>alert('username sudah terdaftar');history.go(-1)</script>";
        }else{
            if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))){
                echo "<script>alert('Username hanya boleh huruf, angka dan underscore');history.go(-1)</script>";
            }else{
                if(strlen(trim($_POST['password'])) < 8){
                    echo "<script>alert('Password setidaknya 8 karakter');history.go(-1)</script>";
                }else{
                    if($password != $password1){
                        echo "<script>alert('Konfirmasi password salah');history.go(-1)</script>";
                    }else{
                        $hash_password = password_hash($password, PASSWORD_BCRYPT);

                        $insert = $db->prepare("INSERT INTO user_admin (username, password) VALUES (:username,:hash_password)");
                        $insert->bindParam(':username',$username);
                        $insert->bindParam(':hash_password',$hash_password);
                        $insert->execute();
                        
                        header('Location: ../../login_system/login.php');
                    }
                }
            }
        }
    }
?>