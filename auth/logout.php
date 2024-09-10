<?php
require("../config/koneksi.php");

$login->logout();
create_alert("Success","Anda sudah logout dari sistem","login_page.php");
?>