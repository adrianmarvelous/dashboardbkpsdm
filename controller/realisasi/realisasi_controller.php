<?php
    $tahun = htmlentities($_GET['tahun']);
    
    $query_realisasi = $db->prepare("SELECT * FROM info_apbd_anggaran WHERE tahun = :tahun ORDER BY bulan ASC");
    $query_realisasi->bindParam(':tahun',$tahun);
    $query_realisasi->execute();
    $array_realisasi = $query_realisasi->fetchAll(PDO::FETCH_ASSOC);

    include 'view/realisasi/index.php';
?>