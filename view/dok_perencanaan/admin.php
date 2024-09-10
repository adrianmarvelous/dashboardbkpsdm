<h1 style="text-align: center;">Upload Dokumen</h1>
<div id="accordionIcon" class="accordion accordion-without-arrow">
    <?php
        $list_dokumen = array("RPJMD","Rencana Strategis","Rencana Kerja","Perjanjian Kinerja","Laporan Kinerja","Penilaian Resiko","Indikator Kinerja Operasional","Proses Bisnis","Standar Operasional Prosedur","Paparan","Pendampingan Inspektorat","Monitoring","Capaian Kinerja dan Anggaran Akhir Tahun","Reformasi Birokrasi","SAKIP","PAK","APBD","Anggaran DPA","BPK","Rencana Kerja Pemerintah Daerah");
        $nama_dok = array("rpjmd","rencana_strategis","rencana_kerja","perkin","laporan_kinerja","penilaian_resiko","iko","proses_bisnis","sop","paparan","pendampingan_inspektorat","monitoring","capaian_kinerja","reformasi_birokrasi","sakip","pak","apbd","anggaran_dpa","bpk","RKPD");
        $jumlah = count($list_dokumen);

        for($i=0;$i<$jumlah;$i++){
    ?>
    <div class="accordion-item card" style="background-color: #e7e7ff;">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
            <button type="button" class="accordion-button collapsed btn btn-primary" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1<?=$i?>" aria-controls="accordionIcon-1<?=$i?>">
            <?=$list_dokumen[$i]?>
            </button>
        </h2>

        <div id="accordionIcon-1<?=$i?>" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
            <div class="accordion-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info m-2" data-bs-toggle="modal" data-bs-target="#basicModal<?=$i?>">
                Upload <i class="bx bx-upload"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal<?=$i?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Upload Dokumen <?=$list_dokumen[$i]?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="controller/dok_perencanaan/admin_dok_perencanaan.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Tahun</label>
                                    <div class="col-sm">
                                        <div class="form-check mt-3">
                                            <input name="tahun" class="form-check-input" type="radio" value="2021" id="defaultRadio1<?=$list_dokumen[$i]?>" />
                                            <label class="form-check-label" for="defaultRadio1<?=$list_dokumen[$i]?>">
                                                2021 <?= (in_array($list_dokumen[$i], ['RPJMD', 'Rencana Strategis']) ? ' - 2026' : ''); ?>
                                            </label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input name="tahun" class="form-check-input" type="radio" value="2022" id="defaultRadio2<?=$list_dokumen[$i]?>"  />
                                            <label class="form-check-label" for="defaultRadio2<?=$list_dokumen[$i]?>">
                                                2022 <?= (in_array($list_dokumen[$i], ['RPJMD', 'Rencana Strategis']) ? ' - 2027' : ''); ?>
                                            </label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input name="tahun" class="form-check-input" type="radio" value="2023" id="defaultRadio3<?=$list_dokumen[$i]?>"  />
                                            <label class="form-check-label" for="defaultRadio3<?=$list_dokumen[$i]?>">
                                                2023 <?= (in_array($list_dokumen[$i], ['RPJMD', 'Rencana Strategis']) ? ' - 2028' : ''); ?>
                                            </label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input name="tahun" class="form-check-input" type="radio" value="2024" id="defaultRadio4<?=$list_dokumen[$i]?>" checked />
                                            <label class="form-check-label" for="defaultRadio4<?=$list_dokumen[$i]?>">
                                                2024 <?= (in_array($list_dokumen[$i], ['RPJMD', 'Rencana Strategis']) ? ' - 2029' : ''); ?>
                                            </label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input name="tahun" class="form-check-input" type="radio" value="2025" id="defaultRadio5<?=$list_dokumen[$i]?>"  />
                                            <label class="form-check-label" for="defaultRadio5<?=$list_dokumen[$i]?>">
                                                2025 <?= (in_array($list_dokumen[$i], ['RPJMD', 'Rencana Strategis']) ? ' - 2030' : ''); ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if($list_dokumen[$i] == 'Rencana Strategis' || $list_dokumen[$i] == 'Rencana Kerja' || $list_dokumen[$i] == 'Peraturan Kinerja'){
                                ?>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Murni / Perubahan</label>
                                        <select name="sub_dokumen" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            <option value="murni">Murni</option>
                                            <option value="perubahan">Perubahan</option>
                                        </select>
                                    </div>
                                </div>
                                <?php }elseif($list_dokumen[$i] == 'Anggaran DPA'){?>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Murni / Perubahan</label>
                                        <select name="sub_dokumen" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            <option value="263 Pengelolaan Mutasi ASN">263 Pengelolaan Mutasi ASN</option>
                                            <option value="264 Pengelolaan Kenaikan Pangkat ASN">264 Pengelolaan Kenaikan Pangkat ASN</option>
                                            <option value="265 Pengelolaan Promosi ASN">265 Pengelolaan Promosi ASN</option>
                                            <option value="266 Penyusunan Rencana Kebutuhan, Jenis dan Jumlah Jabatan untuk Pelaksanaan Pengadaan ASN">266 Penyusunan Rencana Kebutuhan, Jenis dan Jumlah Jabatan untuk Pelaksanaan Pengadaan ASN</option>
                                            <option value="267 Koordinasi dan Fasilitasi Pengadaan PNS dan PPPK">267 Koordinasi dan Fasilitasi Pengadaan PNS dan PPPK</option>
                                            <option value="268 Pengelolaan Data Kepegawaian">268 Pengelolaan Data Kepegawaian</option>
                                            <option value="757 Pengelolaan Penyelesaian Pelanggaran Disiplin ASN">757 Pengelolaan Penyelesaian Pelanggaran Disiplin ASN</option>
                                            <option value="763 Pelaksanaan Penilaian dan Evaluasi Kinerja Aparatur">763 Pelaksanaan Penilaian dan Evaluasi Kinerja Aparatur</option>
                                            <option value="3528 Evaluasi Hasil Penilaian dan Evaluasi Kinerja Aparatur">3528 Evaluasi Hasil Penilaian dan Evaluasi Kinerja Aparatur</option>
                                            <option value="791 Penyelenggaraan Pengembangan Kompetensi bagi Pimpinan Daerah, Jabatan Pimpinan Tinggi, Jabatan Fungsional, Kepemimpinan, dan Prajabatan">791 Penyelenggaraan Pengembangan Kompetensi bagi Pimpinan Daerah, Jabatan Pimpinan Tinggi, Jabatan Fungsional, Kepemimpinan, dan Prajabatan</option>
                                            <option value="795 Penyelenggaraan Pengembangan Kompetensi Teknis Umum, Inti, dan Pilihan bagi Jabatan Administrasi Penyelenggara Urusan Pemerintahan Konkuren, Perangkat Daerah Penunjang, dan Urusan Pemerintahan Umum">795 Penyelenggaraan Pengembangan Kompetensi Teknis Umum, Inti, dan Pilihan bagi Jabatan Administrasi Penyelenggara Urusan Pemerintahan Konkuren ...</option>
                                            <option value="859 Penyediaan Jasa Pelayanan Umum Kantor">859 Penyediaan Jasa Pelayanan Umum Kantor</option>
                                            <option value="862 Penyediaan Peralatan dan Perlengkapan Kantor">862 Penyediaan Peralatan dan Perlengkapan Kantor</option>
                                            <option value="858 Penyediaan Gaji dan Tunjangan ASN">858 Penyediaan Gaji dan Tunjangan ASN</option>
                                        </select>
                                    </div>
                                </div>
                                <?php }?>
                                <?php
                                    if($list_dokumen[$i] == 'Paparan'){
                                ?>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Judul Paparan</label>
                                        <input type="text" id="nameBasic" name="judul" class="form-control" placeholder="Masukan Judul Acara" required>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">File Upload</label>
                                        <input class="form-control" name="<?=$nama_dok[$i]?>" type="file" id="formFile" accept="<?php if($list_dokumen[$i] == 'Paparan'){
                                                    echo 'application/jpg';
                                                }else{
                                                    echo 'application/pdf';
                                                }?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="jenis_dokumen" value="<?=$list_dokumen[$i]?>">
                            <input type="hidden" name="nama_dok" value="<?=$nama_dok[$i]?>">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="tambah_dokumen" class="btn btn-primary">Simpan</button>
                        </div>
                        </div>
                        </form>
                    </div>
                </div>
                <?php
                    $query_dokumen = $db->prepare("SELECT * FROM dok_perencanaan WHERE jenis_dokumen = :jenis_dokumen");
                    $query_dokumen->bindParam(':jenis_dokumen',$list_dokumen[$i]);
                    $query_dokumen->execute();
                    while($dokumen = $query_dokumen->fetch(PDO::FETCH_ASSOC)){
                ?>
                <a style="text-decoration: none;color:#566a7f" href="upload/dokumen_perencanaan/<?=$dokumen['file']?>" target="_blank">
                    <div class="card m-2 p-3 pb-0" style="box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
                        <p style="font-weight: bold;"><?=$dokumen['jenis_dokumen']?></p>
                        <?php
                            if($dokumen['jenis_dokumen'] != 'Paparan'){
                        ?>
                        <p style="text-transform: capitalize;"><?=$dokumen['sub_dokumen']?></p>
                        <?php }elseif($dokumen['jenis_dokumen'] = 'Paparan'){?>
                        <p style="text-transform: capitalize;"><?=$dokumen['judul']?></p>
                        <?php }?>
                        <p><?= $dokumen['tahun'] . (in_array($dokumen['jenis_dokumen'], ['RPJMD', 'Rencana Strategis', 'Laporan Kinerja']) ? ' - ' . ($dokumen['tahun'] + 5) : ''); ?></p>
                        <form action="controller/dok_perencanaan/admin_dok_perencanaan.php">
                            <input type="hidden" name="id" value="<?=$dokumen['id']?>">
                            <button type="submit" name="delete" class="btn btn-danger mb-3"><i class="bx bx-trash"></i></button>
                        </form>
                        
                    </div>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
</div>