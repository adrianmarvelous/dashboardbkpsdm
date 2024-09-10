<style>
    .title{
        font-size: 100px;
        font-weight: bold;
        font-family: 'Water Brush', cursive;
        color:#404040;
    }
    .dokumen{
        margin-top:100px;
        height:250px;
        width:250px;
        border-radius:50px 10px 50px 10px;
        margin:20px;
    }
    .responsive{
        justify-content:space-between;
    }
    #view_mobile{
        display:none;
    }
    #view_web{
        display:block;
    }
    
    @media only screen and (max-width: 700px) {
        .title{
            font-size: 50px;
        }
        .responsive{
            justify-content: center;
        }
        #view_mobile{
            display:block;
        }
        #view_web{
            display:none;
        }
    }
</style>
<div id="layoutSidenav_content">
        <div class="container-fluid">
            <p class="title">Dokumen</p>
            <p class="title" style="margin-top:-50px;margin-bottom:40px"></p>
            <div class="responsive" style="display:flex;flex-wrap:wrap;">
                <?php
                    $list_dokumen = array("RPJMD","Rencana Strategis","Rencana Kerja","Perjanjian Kinerja","Laporan Kinerja","Penilaian Resiko","Indikator Kinerja Operasional","Proses Bisnis","Standar Operasional Prosedur","Paparan","Pendampingan Inspektorat","Monitoring","Capaian Kinerja dan Anggaran Akhir Tahun","Reformasi Birokrasi","SAKIP","PAK","APBD","Anggaran DPA","Rencana Kerja Pemerintah Daerah");
                    $singkatan = array("","(Renstra)","(Renja)","(Perkin)","(LKJ)","","(IKO)","(Probis)","(SOP)","","","(MCP)","","(RB)","","Perubahan Anggaran Keuangan","","","(RKPD)");
                    $color = array("#eae5b3","#e9c3a3","#e5aea3","#e5b1c0","#c9a8c8","#a39fc5","#9db9da","#a0cddc","#a4ccba","#c2d5b2","#f5e3b2","#ec9fa8","#8bcad0","#eae5b3","#e9c3a3","#eae5b3","#e9c3a3","#e5aea3","#e5b1c0");
                    $button_color = array("#D1CD9F","#CFAC91","#CC9A91","#CC9DAA","#B094B0","#8E8AAB","#778DA6","#8DB5C2","#8FB3A2","#ACBD9F","#DBCCA0","#D48E96","#7BB3B8","#D1CD9F","#CFAC91","#D1CD9F","#CFAC91","#CC9A91","#CC9DAA");
                    $jumlah = count($list_dokumen);
                    
                    for($i=0;$i<$jumlah;$i++){
                ?>
                <!--<div class="dokumen" style="background-color:<?=$color[$i]?>;display:flex;flex-direction:column;justify-content:space-between;padding:20px;box-shadow: 10px 10px 20px 10px #888888">-->
                <div class="dokumen" style="background-image: linear-gradient(to right, <?=$color[$i]?> , <?=$button_color[$i]?>);display:flex;flex-direction:column;justify-content:space-between;padding:20px;box-shadow: 10px 10px 20px 10px #888888">
                    <p style="font-size:32px;font-weight:bold;color:white;font-family: 'Solitreo', cursive;text-align:center;line-height:100%;margin-top:20px">
                        <?=$list_dokumen[$i]?>
                        <br>
                        <?=$singkatan[$i]?>
                    </p>
                    <button style="text-align:center;width:70px;height:35px;border-radius:8px;background-color:<?=$button_color[$i]?>;color:white;font-family: 'Solitreo', cursive;font-size:24px;font-weight:bold;border:0px" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$i?>">View</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:<?=$color[$i]?>">
                            <h5 class="modal-title" style="font-family: 'Water Brush', cursive;" id="exampleModalLabel"><?=$list_dokumen[$i]?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                            </button>
                        </div>
                        <div class="modal-body" style="background-color:#E8E3D3">
                            <?php
                                $query_dokumen = $db->prepare("SELECT * FROM dok_perencanaan WHERE jenis_dokumen = :jenis_dokumen");
                                $query_dokumen->bindParam(':jenis_dokumen',$list_dokumen[$i]);
                                $query_dokumen->execute();
                                if($query_dokumen->rowCount() > 0){
                                while($dokumen = $query_dokumen->fetch(PDO::FETCH_ASSOC)){
                                    $sampai = $dokumen['tahun'] + 5;
                            ?>
                            <div style="height:200px;width:100%;border-radius:10px;background-color:<?=$color[$i]?>;box-shadow: 5px 5px 10px 5px #888888;display:flex;flex-direction:column;justify-content:space-between;padding:30px">
                                <p style="font-family: 'Solitreo', cursive;color:white;font-size:32px;text-transform:capitalize;">
                                    <?=$dokumen['tahun']?>
                                    <?php
                                        if($list_dokumen[$i] == 'RPJMD' || $list_dokumen[$i] == 'Rencana Strategis'){
                                            echo " - ".$sampai;
                                        }
                                    ?>
                                    <br>
                                    <?php
                                        if($list_dokumen[$i] == 'Paparan'){
                                            echo $dokumen['judul'];
                                        }elseif($list_dokumen[$i] == "Rencana Strategis" || $list_dokumen[$i] == "Perjanjian Kinerja" || $list_dokumen[$i] == "Rencana Kerja" || $list_dokumen[$i] == "PAK" || $list_dokumen[$i] == "Anggaran DPA"){
                                            echo substr($dokumen['sub_dokumen'],0,25);
                                        }
                                    ?>
                                </p>
                                <div style="display:flex;justify-content:flex-end;">
                                <!--<embed src="../../upload/dokumen_perencanaan/<?=$dokumen['file']?>#toolbar=0" width="500" height="375">-->
                                    <a id="view_mobile" style="width:100px" class="btn btn-primary" href="upload/dokumen_perencanaan/<?=$dokumen['file']?>" target="_blank">View</a>
                                    <a id="view_web" class="btn btn-primary" href="upload/dokumen_perencanaan/pdf_view.php?file=<?=$dokumen['file']?>" target="_blank">View Pdf</a>
                                </div>
                            </div>
                            <br>
                            <?php }}else{?>
                                <p style="font-family: 'Solitreo', cursive;font-size:24px;">Belum Ada Dokumen Terupload</p>
                            <?php }?>
                        </div>
                        <div class="modal-footer"  style="background-color:<?=$color[$i]?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>