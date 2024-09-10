<style>
    .title{
        font-family: 'Fredoka One', cursive;
        font-size:48px;text-align:center;
        color:#3F646B;
    }
    #view_mobile{
        display:none;
    }
    #view_web{
        display:block;
    }
    @media only screen and (max-width: 700px) {
        #view_mobile{
            display:block;
        }
        #view_web{
            display:none;
        }
    }
</style>
<h1 style="text-align: center;">Data Tabel Pagu Anggaran Tahun <?=$tahun?></h1>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Bulan</th>
        <th style="display: none;">Tahun</th>
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
        <td>
            <?php 
                $bulan = $realisasi['bulan'];
                include 'assets/bulan.php';
            ?>
        </td>
        <td style="display:none"><?=$realisasi['tahun']?></td>
        <td>
            <a id="view_mobile" style="width:100px" class="btn btn-primary" href="upload/realisasi/<?=$realisasi['file']?>" target="_blank">View</a>
            <a id="view_web" style="width:100px" class="btn btn-primary" href="upload/realisasi/pdf_view.php?file=<?=$realisasi['file']?>" target="_blank">View</a>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>