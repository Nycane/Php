<?php 
$act="hoadon";
if(isset($_GET['action'])){
    $act=$_GET['action'];
}
switch($act){
        case "hoadon":
        include "./View/Admin/hoadon.php";
        break;
        case "cthd":
        include "./View/Admin/chitiet_hoadon.php";
        break;
        case "sua":
            include "./View/Admin/edithoadon.php";
            break;
        case "edithd":
            echo $_POST['trangthai'];
            echo $_POST['iddh'];
              if(isset($_POST['trangthai'])&&isset($_POST['iddh'])){
                $db = new hoadon_admin();
                $db->updateTrangThai($_POST['iddh'],$_POST['trangthai']);
                echo "<script>alert('Cập nhật thành công')</script>";
                 echo "<script type='text/javascript'>window.location='./index.php?act=hoadon_admin&action=hoadon';</script>";

              }
              break;
}
?>