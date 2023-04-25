<?php 
$act="thongke";
if(isset($_GET['action'])){
    $act=$_GET['action'];
}
switch($act){
    case "thongke":
        include "./View/admin/thongke.php";
        break;
}
?>