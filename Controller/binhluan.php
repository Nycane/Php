<?php 
    if(isset($_POST['idsp'])&&isset($_POST['cmt'])&&isset($_SESSION['id'])){
        $idsp=$_POST['idsp'];
        $cmt=$_POST['cmt'];
        $iduser=$_SESSION['id'];
        $rate=$_POST['star'];
        $db=new binhluan();
        $db->sendCmt($iduser,$cmt,$idsp,$rate);
    }
    if(isset($_GET['idcmt'])){
        $bl=new binhluan();
        $bl->Like($_GET['idcmt']);
    }
    include "./View/Chitiet_sanpham/ctsp.php";
 
 ?>