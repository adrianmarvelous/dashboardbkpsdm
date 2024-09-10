<h1 style="text-align: center;">Data Tabel Pagu Anggaran</h1>
<!-- Button trigger modal -->
<button style="width: 200px;" type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#basicModal">
  Upload
</button>

<!-- Modal -->
<form action="controller/realisasi/admin_realisasi.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Upload Realisasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Name</label>
            <input name="date" type="month" id="nameBasic" class="form-control">
          </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="nameBasic" class="form-label">Name</label>
                <input name="file" type="file" id="nameBasic" class="form-control" placeholder="Enter Name">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name="upload" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
            foreach($array_realisasi as $realisasi){
        ?>
      <tr>
        <td><?=$i++?></td>
        <td><?=date('F',strtotime($realisasi['date']))?></td>
        <td><?=date('Y',strtotime($realisasi['date']))?></td>
        <td>
            <a class="btn btn-primary m-1" href="upload/realisasi/<?=$realisasi['file']?>" target="_blank"><i class="bx bx-detail"></i></a>
            <!-- <a class="btn btn-danger" href=""><i class="bx bx-trash"></i></a> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#basicModal<?=$realisasi['id']?>">
            <i class="bx bx-trash"></i>
            </button>

            <!-- Modal -->
            <form action="controller/realisasi/admin_realisasi.php" method="get" enctype="multipart/form-data">
            <div class="modal fade" id="basicModal<?=$realisasi['id']?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Realisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Hapus Realisasi <span style="font-weight: bold;"><?=date("F-Y",strtotime($realisasi['date']))?></span></p>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id" value="<?=$realisasi['id']?>">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                </div>
                </div>
            </div>
            </div>
            </form>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>