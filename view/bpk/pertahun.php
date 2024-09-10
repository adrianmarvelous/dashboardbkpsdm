<h1 style="text-align: center;">Dokumen Tahun <?=$tahun?></h1>
<div id="accordionIcon" class="accordion accordion-without-arrow">
    <?php
        $i=1;
        foreach($array_jenis_dokumen as $jenis_dok){
    ?>
    <div class="accordion-item card" style="background-color: #e7e7ff;">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
            <button  style="text-transform: capitalize;"  type="button" class="accordion-button collapsed btn btn-primary" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1<?=$i?>" aria-controls="accordionIcon-1<?=$i?>">
            <?=$jenis_dok['sub_dokumen']?>
            </button>
        </h2>

        <div id="accordionIcon-1<?=$i++?>" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
            <div class="accordion-body">
                <?php
                    $query_bpk = $db->prepare("SELECT * FROM dok_perencanaan WHERE sub_dokumen = :sub_dokumen AND tahun = :tahun");
                    $query_bpk->bindParam(':sub_dokumen',$jenis_dok['sub_dokumen']);
                    $query_bpk->bindParam(':tahun',$tahun);
                    $query_bpk->execute();
                    while($bpk = $query_bpk->fetch(PDO::FETCH_ASSOC)){
                ?>
                <a style="text-decoration: none;color:#566a7f" href="upload/dokumen_perencanaan/<?=$bpk['file']?>" target="_blank">
                    <div class="card m-2 p-3 pb-0" style="box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
                        <p><?=$bpk['judul']?></p>
                    </div>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
</div>