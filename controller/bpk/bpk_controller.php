<?php
    $tahun = htmlentities($_GET['tahun']);

    $query_jenis_dokumen = $db->prepare("SELECT DISTINCT sub_dokumen FROM dok_perencanaan WHERE tahun = :tahun AND jenis_dokumen = 'BPK'");
    $query_jenis_dokumen->bindParam(':tahun',$tahun);
    $query_jenis_dokumen->execute();
    $array_jenis_dokumen = $query_jenis_dokumen->fetchAll(PDO::FETCH_ASSOC);
    
    include 'view/bpk/pertahun.php';
?>