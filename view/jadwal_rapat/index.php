<h1 style="text-align: center;">Jadwal Rapat</h1>
<div class="accordion" id="accordionExample">
    <div class="card accordion-item" style="width: 250px;">
        <h2 class="accordion-header" id="headingOne">
        <button style="background-color: #C9EEF7;" type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne" role="tabpanel">
           Filter
        </button>
        </h2>

        <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <form method="GET" action="?pages=view_jadwal_acara">
                <input style="width:200px" class="form-control mt-3" type="date" name="tanggal_filter" required>
                <input type="hidden" name="pages" value="view_jadwal_acara">
                <button name="filter_tanggal" class="btn btn-primary mt-2">Filter</button>
                <a class="btn btn-primary mt-2" href="?pages=view_jadwal_acara&filter=3hari">H + 3 Hari</a>
            </form>
        </div>
        </div>
    </div>
</div>
<div class="table-responsive mt-5">
  <table class="table table-striped">
    <thead>
      <tr class="table-primary">
        <th>No</th>
        <th>Tanggal</th>
        <th>Pukul</th>
        <th>OPD</th>
        <th>Acara</th>
        <th>Tempat</th>
        <th>Bidang</th>
        <th>Disposisi</th>
        <!-- <?php
            if(htmlentities($_SESSION['role']) == 'kepala badan' || htmlentities($_SESSION['role']) == 'admin_dashboard'){
        ?>
        <th>Sifat</th>
        <th>Resume</th>
        <?php }?> -->
      </tr>
    </thead>
    <tbody>
        <?php $i=1;
            foreach($array_rapat as $rapat){
                if($rapat['pukul_selesai'] == "00:00:00"){
                    $rapat['pukul_selesai'] = "Selesai";
                }else{
                    date("H:i",strtotime($rapat['pukul_selesai']));
                }
        ?>
    <tr class="table-info">
        <td><?=$i++?></td>
        <td>
            <?php
                $tgl1 = date('d',strtotime($rapat['tanggal_mulai']));
                $bulan = date('m',strtotime($rapat['tanggal_mulai']));
                $tahun = date('Y',strtotime($rapat['tanggal_mulai']));
                include 'assets/bulan_.php';
                    if(!$rapat['tanggal_selesai']){
                        echo $tgl1." ".$bulan_." ".$tahun;
                    }else{
                        $tgl2 = date('d',strtotime($rapat['tanggal_selesai']));
                        echo $tgl1." - ".$tgl2." ".$bulan_." ".$tahun;
                    }
            ?>
        </td>
        <td><?=date("H:i",strtotime($rapat['pukul_mulai']))." - ".$rapat['pukul_selesai']?></td>
        <td><?=$rapat['nama_opd']?></td>
        <td><?=$rapat['nama_acara']?></td>
        <td><?=$rapat['tempat']?></td>
        <td><?=$rapat['disposisi']?></td>
        <td>
            <?php
                if($rapat['sekretariat'] == 1){
                    echo "Sekretariat - ";
                }
                if($rapat['bangkom'] == 1){
                    echo "Bangkom - ";
                }
                if($rapat['pkp'] == 1){
                    echo "PKP - ";
                }
                if($rapat['paik'] == 1){
                    echo "PAIK - ";
                }
            ?>
            <!-- <?php
            // if($rapat['bidang_1'] != '0'){
            //     switch($rapat['bidang_1']){
            //         case 1:
            //             echo "Sekretariat";
            //             break;
            //         case 2:
            //             echo "BangKom";
            //             break;
            //         case 3:
            //             echo "PKP";
            //             break;
            //         case 4:
            //             echo "PAIK";
            //             break;
            //         case 0:
            //             echo "-";
            //             break;
            //     }
            //     if($rapat['bidang_2'] != '0'){
            //         switch($rapat['bidang_2']){
            //             case 1:
            //                 echo ", Sekretariat";
            //                 break;
            //             case 2:
            //                 echo ", BangKom";
            //                 break;
            //             case 3:
            //                 echo ", PKP";
            //                 break;
            //             case 4:
            //                 echo ", PAIK";
            //                 break;
            //         }
            //         if($rapat['bidang_3'] != '0'){
            //             switch($rapat['bidang_3']){
            //                 case 1:
            //                     echo ", Sekretariat";
            //                     break;
            //                 case 2:
            //                     echo ", BangKom";
            //                     break;
            //                 case 3:
            //                     echo ", PKP";
            //                     break;
            //                 case 4:
            //                     echo ", PAIK";
            //                     break;
            //             }
            //             if($rapat['bidang_4'] != '0'){
            //                 switch($rapat['bidang_4']){
            //                     case 1:
            //                         echo ", Sekretariat";
            //                         break;
            //                     case 2:
            //                         echo ", BangKom";
            //                         break;
            //                     case 3:
            //                         echo ", PKP";
            //                         break;
            //                     case 4:
            //                         echo ", PAIK";
            //                         break;
            //                 }
            //             }
            //         }
            //     }
            // }

            ?> -->
        </td>
        
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>