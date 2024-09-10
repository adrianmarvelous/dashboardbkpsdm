<?php
    ini_set('display_errors', 1);
    error_reporting(~0);
    $bulan = date('m');
    $tahun = date('Y');

    if(htmlentities(isset($_GET['tambah_acara'])) || htmlentities(isset($_GET['edit_acara']))){
        require_once '../../config/koneksi.php';
        $nama_opd = htmlentities($_GET['nama_opd']);
        $nama_acara = htmlentities($_GET['nama_acara']);
        $tanggal_mulai = htmlentities($_GET['tanggal_mulai']);
        $tanggal_selesai = htmlentities($_GET['tanggal_selesai']);
        $pukul_mulai = htmlentities($_GET['pukul_mulai']);
        $pukul_selesai = htmlentities($_GET['pukul_selesai']);
        $tempat = htmlentities($_GET['tempat']);
        $disposisi = htmlentities($_GET['disposisi']);

        if(htmlentities(isset($_GET['sekretariat']))){
            $sekretariat = 1;
        }else{
            $sekretariat = 0;
        }
        if(htmlentities(isset($_GET['bangkom']))){
            $bangkom = 1;
        }else{
            $bangkom = 0;
        }
        if(htmlentities(isset($_GET['pkp']))){
            $pkp = 1;
        }else{
            $pkp = 0;
        }
        if(htmlentities(isset($_GET['paik']))){
            $paik = 1;
        }else{
            $paik = 0;
        }
        
        if($tanggal_selesai == ''){
            $tanggal_selesai = NULL;
        }
        
        if(htmlentities(isset($_GET['tambah_acara']))){
            $insert = $db->prepare("INSERT INTO dashboard_web_jadwal_rapat (nama_opd,nama_acara,tanggal_mulai,tanggal_selesai,pukul_mulai,pukul_selesai,tempat,disposisi,sekretariat,bangkom,pkp,paik) VALUES (:nama_opd,:nama_acara,:tanggal_mulai,:tanggal_selesai,:pukul_mulai,:pukul_selesai,:tempat,:disposisi,:sekretariat,:bangkom,:pkp,:paik)");
        }elseif(htmlentities(isset($_GET['edit_acara']))){
            $id = htmlentities($_GET['id']);

            $insert = $db->prepare("UPDATE dashboard_web_jadwal_rapat SET nama_opd=:nama_opd, nama_acara=:nama_acara, tanggal_mulai=:tanggal_mulai, tanggal_selesai=:tanggal_selesai, pukul_mulai=:pukul_mulai, pukul_selesai=:pukul_selesai, tempat=:tempat, disposisi=:disposisi, sekretariat=:sekretariat, bangkom=:bangkom, pkp=:pkp, paik=:paik WHERE id=:id");
            $insert->bindParam(':id',$id);
        }

        $insert->bindParam(':nama_opd',$nama_opd);
        $insert->bindParam(':nama_acara',$nama_acara);
        $insert->bindParam(':tanggal_mulai',$tanggal_mulai);
        $insert->bindParam(':tanggal_selesai',$tanggal_selesai);
        $insert->bindParam(':pukul_mulai',$pukul_mulai);
        $insert->bindParam(':pukul_selesai',$pukul_selesai);
        $insert->bindParam(':tempat',$tempat);
        $insert->bindParam(':disposisi',$disposisi);
        $insert->bindParam(':sekretariat',$sekretariat);
        $insert->bindParam(':bangkom',$bangkom);
        $insert->bindParam(':pkp',$pkp);
        $insert->bindParam(':paik',$paik);
        $insert->execute();

        header('Location: ../../index.php?pages=index_jadwal_acara');

    }elseif(htmlentities(isset($_GET['hapus_acara']))){
        require_once '../../config/koneksi.php';
        $id = htmlentities($_GET['id']);

        $delete = $db->prepare("DELETE FROM dashboard_web_jadwal_rapat WHERE id = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        
        header('Location: ../../index.php?pages=index_jadwal_acara');
    }else{
        if(htmlentities(isset($_GET['filter']))){
            $tanggal = htmlentities($_GET['tanggal']);
        
            $query_jadwal = $db->prepare("SELECT * FROM dashboard_web_jadwal_rapat WHERE tanggal_mulai = :tanggal ORDER BY tanggal_mulai  ASC, pukul_mulai");
            $query_jadwal->bindParam(':tanggal',$tanggal);
            $query_jadwal->execute();
        }else{
            $query_jadwal = $db->prepare("SELECT * FROM dashboard_web_jadwal_rapat WHERE DATE(tanggal_mulai) BETWEEN CURDATE() AND CURDATE() + INTERVAL 2 DAY ORDER BY tanggal_mulai  ASC, pukul_mulai");
            $query_jadwal->bindParam(':bulan',$bulan);
            $query_jadwal->bindParam(':tahun',$tahun);
        }
        $query_jadwal->execute();
    }

    $array_rapat = $query_jadwal->fetchAll(PDO::FETCH_ASSOC);

    include 'view/jadwal_rapat/admin.php';

?>