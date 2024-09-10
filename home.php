<style>
    .Tes{
        border: 1px solid;
        height: 100px;
        width: 40%;
    }
    .title{
        /* margin:20px; */
        font-size: 50px;
        font-weight:bold;
        font-family: 'Secular One', sans-serif;
    }
    .jadwal_rapat{
        box-shadow: 5px 5px 10px 5px #888888;
        border:0px;
        height: 400px;
        width: 300px;
        background-size: 300px 400px;
        border-radius: 50px;
        padding:30px;
        margin:20px;
        font-size:32px;
        font-weight:bold;
        background-image: url('assets/background/pexels-christina-morillo-1181395.jpg');
    }
    @media only screen and (max-width: 600px) {
        .Tes{
            width: 100%;
        }
        .card{
            width: 100%;
        }
        .responsive{
            justify-content:center;
        }
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid" style="padding:20px;">
            <!--<h1 class="mt-4" class="title">Dashboard</h1>-->
            <p class="title">Dashboard</p>
            <!--<div class="card mb-4"  style="padding: 20px">-->
            <div class="responsive" style="display:flex;flex-wrap:wrap;">
                <?php
                    $menu = array("Jadwal Rapat","Dokumen","Data Kepegawaian","Realisasi");
                    $bg = array(
                        "assets/background/pexels-christina-morillo-1181395.jpg",
                        "assets/background/pexels-olena-bohovyk-3646172.jpg",
                        "assets/background/pexels-olia-danilevich-8145252.jpg",
                        "assets/background/pexels-karolina-grabowska-4386321.jpg"

                    );
                    $link = array(
                        "view_jadwal_acara",
                        "view_dokumen_perencanaan",
                        "",
                        "view_realisasi"
                    );
                    $jumlah = count($menu);
                    for($i=0;$i<$jumlah;$i++){
                ?>
                <form action="index.php">
                    <input type="hidden" name="pages" value="<?=$link[$i]?>">
                <button class="jadwal_rapat" style="background-image:url(<?=$bg[$i]?>)">
                    <p style="margin-top:-170px;font-family: 'Bebas Neue', cursive;"><?=$menu[$i]?></p>
                </button>
                </form>
                <?php }?>
                <form action="https://eaudit.surabaya.go.id">
                <button class="jadwal_rapat" style="background-image:url(assets/background/pexels-yan-krukau-7691768.jpg)">
                    <div style="display:flex;flex-direction:column;justify-content:space-between;height:100%">
                        <p style="font-family: 'Bebas Neue', cursive;">E-Audit</p>
                        <div>
                            <p style="font-family: 'Bebas Neue', cursive;">Zona Integeritas</p>
                        </div>
                    </div>
                </button>
                </form>
                <form action="https://eplanning.surabaya.go.id/">
                <button class="jadwal_rapat" style="background-image:url(assets/background/pexels-john-diez-7578192.jpg)">
                    <div style="display:flex;flex-direction:column;justify-content:space-between;height:100%">
                        <p style="font-family: 'Bebas Neue', cursive;">E-Planning</p>
                        <div>
                        </div>
                    </div>
                </button>
                </form>
            </div>
        </div>
    </main>
</div>