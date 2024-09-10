<h1 style="text-align: center;">Jadwal Rapat</h1>
<div class="accordion" id="accordionExample">
    <!-- <div class="card accordion-item" style="width: 250px;">
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
    </div> -->
    <!-- Button trigger modal -->
    <div class="row">
        <div class="d-flex justify-content-between" >
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Tambah Jadwal
                </button>
            </div>
            <div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" style="width: 200px;">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button shadow p-3 mb-5 bg-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Filter
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="?pages=index_jadwal_acara" method="get">
                                <input type="hidden" name="pages" value="index_jadwal_acara">
                            <input type="date" name="tanggal" class="form-control">
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="filter" class="btn btn-primary mt-2">Filter</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Tambah Jadwal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="controller/jadwal_rapat/admin_jadwal_rapat.php" method="get">
            <div class="row">
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Nama OPD</label>
                    <input type="text" id="nameBasic" name="nama_opd" class="form-control" placeholder="Masukan Nama OPD" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Nama Acara</label>
                    <input type="text" id="nameBasic" name="nama_acara" class="form-control" placeholder="Masukan Nama Acara" required>
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="dobBasic" class="form-label">Tanggal Mulai</label>
                    <input type="date" id="dobBasic" class="form-control"  name="tanggal_mulai" required>
                </div>
                <div class="col mb-3">
                    <label for="dobBasic" class="form-label">Tanggal Selesai</label>
                    <input type="date" id="dobBasic" class="form-control"  name="tanggal_selesai">
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="dobBasic" class="form-label">Pukul Mulai</label>
                    <input type="time" id="dobBasic" class="form-control"  name="pukul_mulai" required>
                </div>
                <div class="col mb-3">
                    <label for="dobBasic" class="form-label">Pukul Selesai</label>
                    <input type="time" id="dobBasic" class="form-control"  name="pukul_selesai">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Tempat</label>
                    <input type="text" id="nameBasic" class="form-control" placeholder="Masukan Tempat Acara" name="tempat" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Disposisi</label>
                    <input type="text" id="nameBasic" class="form-control" placeholder="Masukan Disposisi" name="disposisi" required>
                </div>
            </div>
            <div class="row">
                <label for="nameBasic" class="form-label">Bidang</label>
                <div class="col">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="sekretariat" />
                        <label class="form-check-label" for="defaultCheck1">
                            Sekretariat
                        </label>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2"  name="bangkom"/>
                        <label class="form-check-label" for="defaultCheck2">
                            Bangkom
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"  name="pkp"/>
                        <label class="form-check-label" for="defaultCheck3">
                            PKP
                        </label>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4"  name="paik"/>
                        <label class="form-check-label" for="defaultCheck4">
                            PAIK
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" name="tambah_acara" class="btn btn-primary">Simpan</button>
        </div>
        </div>
        </form>
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
        <th>Aksi</th>
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
        <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#basicModaldelete<?=$i?>">
            <i class="bx bx-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="basicModaldelete<?=$i?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Jadwal Rapat?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Hapus Jadwal <span style="font-weight: bold;"><?=$rapat['nama_acara']?></span></p>
                </div>
                <div class="modal-footer">
                    <form action="controller/jadwal_rapat/admin_jadwal_rapat.php" method="get">
                    <input type="hidden" name="id" value="<?=$rapat['id']?>">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" name="hapus_acara" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#basicModaledit<?=$i?>">
            <i class="bx bx-pencil"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="basicModaledit<?=$i?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="controller/jadwal_rapat/admin_jadwal_rapat.php" method="get">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama OPD</label>
                            <input type="text" id="nameBasic" name="nama_opd" class="form-control" placeholder="Masukan Nama OPD" value="<?=$rapat['nama_opd']?>"  required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Acara</label>
                            <input type="text" id="nameBasic" name="nama_acara" class="form-control" placeholder="Masukan Nama Acara" value="<?=$rapat['nama_acara']?>" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">Tanggal Mulai</label>
                            <input type="date" id="dobBasic" class="form-control"  name="tanggal_mulai" value="<?=$rapat['tanggal_mulai']?>" required>
                        </div>
                        <div class="col mb-3">
                            <label for="dobBasic" class="form-label">Tanggal Selesai</label>
                            <input type="date" id="dobBasic" class="form-control"  name="tanggal_selesai" value="<?=$rapat['tanggal_selesai']?>">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">Pukul Mulai</label>
                            <input type="time" id="dobBasic" class="form-control"  name="pukul_mulai" value="<?=$rapat['pukul_mulai']?>" required>
                        </div>
                        <div class="col mb-3">
                            <label for="dobBasic" class="form-label">Pukul Selesai</label>
                            <input type="time" id="dobBasic" class="form-control"  name="pukul_selesai" value="<?=$rapat['pukul_selesai']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tempat</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Masukan Tempat Acara" name="tempat" value="<?=$rapat['tempat']?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Disposisi</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Masukan Disposisi" name="disposisi" value="<?=$rapat['disposisi']?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <label for="nameBasic" class="form-label">Bidang</label>
                        <div class="col">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1<?=$i?>" name="sekretariat" <?= $rapat['sekretariat'] == 1 ? 'checked' : '' ?>/>
                                <label class="form-check-label" for="defaultCheck1<?=$i?>">
                                    Sekretariat
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2<?=$i?>"  name="bangkom" <?= $rapat['bangkom'] == 1 ? 'checked' : '' ?>/>
                                <label class="form-check-label" for="defaultCheck2<?=$i?>">
                                    Bangkom
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3<?=$i?>"  name="pkp" <?= $rapat['pkp'] == 1 ? 'checked' : '' ?>/>
                                <label class="form-check-label" for="defaultCheck3<?=$i?>">
                                    PKP
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck4<?=$i?>"  name="paik" <?= $rapat['paik'] == 1 ? 'checked' : '' ?>/>
                                <label class="form-check-label" for="defaultCheck4<?=$i?>">
                                    PAIK
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?=$rapat['id']?>">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="edit_acara" class="btn btn-primary">Simpan</button>
                </div>
                </div>
                </form>
            </div>
            </div>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>