<h1 style="text-align: center;">Dokumen Tahun <?=$tahun?></h1>
<div id="accordionIcon" class="accordion accordion-without-arrow">
    <?php
        $i=1;
        foreach($array_dok_5_thn as $dok_5_tthn){
    ?>
    <div class="accordion-item card" style="background-color: #e7e7ff;">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
            <button type="button" class="accordion-button collapsed btn btn-primary" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1<?=$i?>" aria-controls="accordionIcon-1<?=$i?>">
            <?=$dok_5_tthn['jenis_dokumen']?>
            </button>
        </h2>

        <div id="accordionIcon-1<?=$i++?>" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
            <div class="accordion-body">
                <?php
                    $query_dokumen = $db->prepare("SELECT * FROM dok_perencanaan WHERE jenis_dokumen = :jenis_dokumen  AND (tahun = :tahun OR tahun + 1 = :tahun OR tahun + 2 = :tahun OR tahun + 3 = :tahun OR tahun + 4 = :tahun OR tahun + 5 = :tahun)");
                    $query_dokumen->bindParam(':tahun',$tahun);
                    $query_dokumen->bindParam(':jenis_dokumen',$dok_5_tthn['jenis_dokumen']);
                    $query_dokumen->execute();
                    while($dokumen = $query_dokumen->fetch(PDO::FETCH_ASSOC)){
                ?>
                <a style="text-decoration: none;color:#566a7f" href="upload/dokumen_perencanaan/<?=$dokumen['file']?>" target="_blank">
                    <div class="card m-2 p-3 pb-0" style="box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
                        <p><?=$dokumen['jenis_dokumen']?></p>
                        <p style="text-transform: capitalize;"><?=$dokumen['sub_dokumen']?></p>
                        <p><?=$dokumen['tahun']?> - <?=$dokumen['tahun']+5?></p>
                    </div>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>

    <?php
        // $i=1;
        foreach($array_jenis_dokumen as $jenis_dok){
    ?>
    <div class="accordion-item card" style="background-color: #e7e7ff;">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
            <button type="button" class="accordion-button collapsed btn btn-primary" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1<?=$i?>" aria-controls="accordionIcon-1<?=$i?>">
            <?=$jenis_dok['jenis_dokumen']?>
            </button>
        </h2>

        <div id="accordionIcon-1<?=$i++?>" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
            <div class="accordion-body">
                <?php
                    $query_dokumen = $db->prepare("SELECT * FROM dok_perencanaan WHERE jenis_dokumen = :jenis_dokumen AND tahun = :tahun");
                    $query_dokumen->bindParam(':tahun',$tahun);
                    $query_dokumen->bindParam(':jenis_dokumen',$jenis_dok['jenis_dokumen']);
                    $query_dokumen->execute();
                    while($dokumen = $query_dokumen->fetch(PDO::FETCH_ASSOC)){
                ?>
                <a style="text-decoration: none;color:#566a7f" href="upload/dokumen_perencanaan/<?=$dokumen['file']?>" target="_blank">
                    <div class="card m-2 p-3 pb-0" style="box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
                        <p><?=$dokumen['jenis_dokumen']?></p>
                        <p style="text-transform: capitalize;"><?=$dokumen['sub_dokumen']?></p>
                        <p><?=$dokumen['tahun']?></p>
                    </div>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
</div>