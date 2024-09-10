<?php
if (isset($_GET['tahun'])) {
    $tahun = htmlentities($_GET['tahun']);

    // try {
    //     // Enable buffered queries
    //     $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $query_5_tahun = $db->prepare("SELECT DISTINCT jenis_dokumen
    FROM dok_perencanaan
    WHERE jenis_dokumen IN ('RPJMD', 'Rencana Strategis') 
      AND (tahun = :tahun OR tahun + 1 = :tahun OR tahun + 2 = :tahun OR tahun + 3 = :tahun OR tahun + 4 = :tahun OR tahun + 5 = :tahun)");

        $query_5_tahun->bindParam(':tahun', $tahun);
        $query_5_tahun->execute();
        $array_dok_5_thn = $query_5_tahun->fetchAll(PDO::FETCH_ASSOC);

        // Disable buffered queries
        // $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

        $query_jenis_dokumen = $db->prepare("SELECT DISTINCT jenis_dokumen FROM dok_perencanaan WHERE tahun = :tahun AND jenis_dokumen NOT IN ('BPK', 'RPJMD', 'Rencana Strategis')");
        $query_jenis_dokumen->bindParam(':tahun', $tahun);
        $query_jenis_dokumen->execute();
        $array_jenis_dokumen = $query_jenis_dokumen->fetchAll(PDO::FETCH_ASSOC);

        include 'view/dok_perencanaan/pertahun.php';
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // }
} else {
    include 'view/dok_perencanaan/index.php';
}
?>
