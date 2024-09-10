<?php
ini_set('display_errors', 1);
error_reporting(~0);
    require_once '../config/koneksi.php';

    $i = 1;
    $query_data = $db->prepare("SELECT * FROM dashboard_web_jadwal_rapat");
    $query_data->execute();
    $array_data = $query_data->fetch(PDO::FETCH_ASSOC);
    
    // var_dump($array_data);
?>
<table>
    <tr>
        <td>No</td>
        <td>Id</td>
        <td>Nama Acara</td>
        <td>Bidang 1</td>
        <td>Bidang 2</td>
        <td>Bidang 3</td>
        <td>Bidang 4</td>
    </tr>
    <?php
        foreach($query_data as $data){
            if($data['bidang_4'] == 4){
                $update = $db->prepare("UPDATE dashboard_web_jadwal_rapat SET paik = 1 WHERE id = :id");
                $update->bindParam(':id',$data['id']);
                $update->execute();
            }
    ?>
    <tr>
        <td><?=$i++?></td>
        <td><?=$data['id']?></td>
        <td><?=$data['nama_acara']?></td>
        <td><?=$data['bidang_1']?></td>
        <td><?=$data['bidang_2']?></td>
        <td><?=$data['bidang_3']?></td>
        <td><?=$data['bidang_4']?></td>
        <td><?=$data['sekretariat']?></td>
        <td><?=$data['bangkom']?></td>
        <td><?=$data['pkp']?></td>
        <td><?=$data['paik']?></td>
    </tr>
    <?php }?>
</table>