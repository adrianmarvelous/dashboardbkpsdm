<?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    if(htmlentities(isset($_POST['upload']))){
        require_once '../../config/koneksi.php';
        $date = htmlentities($_POST['date']);
        $bulantahun = date('Y-m-d',strtotime($date));

        function re_name($nama){
            echo $file_name = htmlentities($_FILES[$nama]['name']);
            echo $file_size = htmlentities($_FILES[$nama]['size']);
            if(!empty($file_name)){
                if($file_size > 10000000){
                    echo "<script>alert('Ukuran file $nama terlalu besar');history.go(-1);</script>";
                }else{
                    $acak = rand(00000000, 99999999);
                    $FileExt       = substr($file_name, strrpos($file_name, '.'));
                    $FileExt       = str_replace('.','',$FileExt);
                    $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                    $NewFileName   = $acak.'_'.$file_name.'.'.$FileExt;
                    $directory = '../../upload/realisasi/';
                    move_uploaded_file($_FILES[$nama]['tmp_name'],$directory.$NewFileName);
                    return $NewFileName;
                }
            }
        }
        
        echo $file_resume_rapat = re_name("file");
        
        $insert = $db->prepare("INSERT INTO info_apbd_anggaran (date,file) VALUES (:date,:file)");
        $insert->bindParam(':date',$bulantahun);
        $insert->bindParam(':file',$file_resume_rapat);

        $insert->execute();
        header('Location: ../../index.php?pages=index_realisasi');
    }elseif(htmlentities(isset($_GET['delete']))){
        require_once '../../config/koneksi.php';

        $id = htmlentities($_GET['id']);
        
        $query_file = $db->prepare("SELECT file FROM info_apbd_anggaran WHERE id = :id");
        $query_file->bindParam('id',$id);
        $query_file->execute();
        $file = $query_file->fetch(PDO::FETCH_ASSOC);
        
        
        
        unlink('../../upload/realisasi/'.$file['file'].'');
        
        $delete = $db->prepare("DELETE FROM info_apbd_anggaran WHERE id = :id");
        $delete->bindparam(':id',$id);
        $delete->execute();

        header('Location: ../../index.php?pages=index_realisasi'); 
    }else{
        $query_realisasi = $db->prepare("SELECT * FROM info_apbd_anggaran");
        $query_realisasi->execute();
    }

    $array_realisasi = $query_realisasi->fetchAll(PDO::FETCH_ASSOC);
    include 'view/realisasi/admin.php';
?>