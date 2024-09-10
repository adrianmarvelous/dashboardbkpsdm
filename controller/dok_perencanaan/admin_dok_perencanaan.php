<?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    if(htmlentities(isset($_POST['tambah_dokumen']))){
        require_once '../../config/koneksi.php';
        
        $jenis_dokumen = htmlentities($_POST['jenis_dokumen']);
        if(htmlentities(isset($_POST['tahun']))){
            $tahun = htmlentities($_POST['tahun']);
        }else{
            $tahun = NULL;
        }
        
        if($jenis_dokumen == "Rencana Strategis" || $jenis_dokumen == "Perjanjian Kinerja" || $jenis_dokumen == "Rencana Kerja" || $jenis_dokumen == "Anggaran DPA" || $jenis_dokumen == "BPK"){
            $sub_dokumen = htmlentities($_POST['sub_dokumen']);
        }else{
            $sub_dokumen = NULL;
        }
        $nama_dok = htmlentities($_POST['nama_dok']);

        if(htmlentities(isset($_POST['judul']))){
            $judul = htmlentities($_POST['judul']);
        }else{
            $judul = NULL;
        }

        
        $file_name = htmlentities($_FILES[$nama_dok]['name']);
        $file_size = htmlentities($_FILES[$nama_dok]['size']);
        if(!empty($file_name)){
            if($file_size > 50000000){
                echo "<script>alert('Ukuran file $file_name terlalu besar');history.go(-1);</script>";
            }else{
                $directory = '../../upload/dokumen_perencanaan/';

                if(htmlentities(isset($_POST['id']))){
                    echo "<br>";
                    echo $id = htmlentities($_POST['id']);

                    $query_file = $db->prepare("SELECT file FROM dok_perencanaan WHERE id = :id");
                    $query_file->bindParam(':id',$id);
                    $query_file->execute();
                    $query_file_lama = $query_file->fetch(PDO::FETCH_ASSOC);
                    $file_lama = $query_file_lama['file'];
                    echo $file_lama;


                    if($file_lama){
                        $directory_delete = $directory.'/'.$file_lama;
                        unlink($directory_delete);
                    }

                    $delete = $db->prepare("DELETE FROM dok_perencanaan WHERE id = :id");
                    $delete->bindParam(':id',$id);
                    $delete->execute();
                }

                $acak = rand(00000000, 99999999);
                $FileExt       = substr($file_name, strrpos($file_name, '.'));
                $FileExt       = str_replace('.','',$FileExt);
                $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                $NewFileName   = $jenis_dokumen.'_'.$acak.'_'.$file_name.'.'.$FileExt;

                move_uploaded_file($_FILES[$nama_dok]['tmp_name'],$directory.$NewFileName);
                //return $NewFileName;

                $query_insert = $db->prepare("INSERT INTO  dok_perencanaan (jenis_dokumen,sub_dokumen,judul,tahun,file) VALUES (:jenis_dokumen,:sub_dokumen,:judul,:tahun,:file)");
                $query_insert->bindParam(':jenis_dokumen',$jenis_dokumen);
                $query_insert->bindParam(':sub_dokumen',$sub_dokumen);
                $query_insert->bindParam(':judul',$judul);
                $query_insert->bindParam(':tahun',$tahun);
                $query_insert->bindParam(':file',$NewFileName);
                $query_insert->execute();
            }
        }
        
        header('Location: ../../index.php?pages=index_dokumen');

    }elseif(htmlentities(isset($_GET['delete']))){
        require_once '../../config/koneksi.php';

        $id = htmlentities($_GET['id']);
        
        $query_file = $db->prepare("SELECT file FROM dok_perencanaan WHERE id = :id");
        $query_file->bindParam('id',$id);
        $query_file->execute();
        $file = $query_file->fetch(PDO::FETCH_ASSOC);
        
        
        
        unlink('../../upload/dokumen_perencanaan/'.$file['file'].'');
        
        $delete = $db->prepare("DELETE FROM dok_perencanaan WHERE id = :id");
        $delete->bindparam(':id',$id);
        $delete->execute();

        header('Location: ../../index.php?pages=index_dokumen');
    }
    else{
        $query_data = $db->prepare("SELECT DISTINCT jenis_dokumen FROM dok_perencanaan WHERE jenis_dokumen != 'BPK'");
        $query_data->execute();
    }

    $array_data = $query_data->fetchAll(PDO::FETCH_ASSOC);
    include 'view/dok_perencanaan/admin.php';
?>