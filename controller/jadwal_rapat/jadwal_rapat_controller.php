<?php
// ini_set('display_errors', 1);
// error_reporting(~0);
// require_once 'config/koneksi.php';

    if(!isset($_GET['filter_tanggal'])){
        $tgl_hari_ini = date("Y-m-d");
        $tgl_3 = date('Y-m-d', strtotime($tgl_hari_ini. ' + 2 days'));
        $query_rapat = $db->prepare("SELECT * FROM dashboard_web_jadwal_rapat WHERE tanggal_mulai >= :tgl_hari_ini AND tanggal_mulai <= :tgl_3 ORDER BY tanggal_mulai ASC, pukul_mulai");
        $query_rapat->bindParam(':tgl_hari_ini',$tgl_hari_ini);
        $query_rapat->bindParam(':tgl_3',$tgl_3);
        $query_rapat->execute();
    }elseif(isset($_GET['filter_tanggal'])){
        $tanggal = htmlentities($_GET['tanggal_filter']);
        $query_rapat = $db->prepare("SELECT * FROM dashboard_web_jadwal_rapat WHERE tanggal_mulai = :tanggal ORDER BY tanggal_mulai ASC, pukul_mulai");
        $query_rapat->bindParam(':tanggal',$tanggal);
        $query_rapat->execute();
    }elseif(isset($_GET['filter'])){
        $tgl_hari_ini = date("Y-m-d");
        $tgl_3 = date('Y-m-d', strtotime($tgl_hari_ini. ' + 2 days'));
        $query_rapat = $db->prepare("SELECT * FROM dashboard_web_jadwal_rapat WHERE tanggal_mulai >= :tgl_hari_ini AND tanggal_mulai <= :tgl_3 ORDER BY tanggal_mulai ASC, pukul_mulai");
        $query_rapat->bindParam(':tgl_hari_ini',$tgl_hari_ini);
        $query_rapat->bindParam(':tgl_3',$tgl_3);
    }
    $array_rapat = $query_rapat->fetchAll(PDO::FETCH_ASSOC);
    include 'view/jadwal_rapat/index.php';

?>