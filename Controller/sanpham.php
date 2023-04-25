<?php 
if(!isset($_SESSION['dsyeuthich'])){
    $_SESSION['dsyeuthich']=[];
}
$ctrl="";
if(isset($_GET['action'])){
    $ctrl=$_GET['action'];
}
switch($ctrl){
    case "sanpham":
        include "./View/sanpham.php";
        break; 
    case "chitiet":
        include "./View/Chitiet_sanpham/ctsp.php";
        break;  
     case "search":
        include "./View/search.php";
        break;       
     case "yeuthich":
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $db = new danhsachyeuthich();
            $db->them($id);
            echo "<script>alert('Đã thêm vào danh sách yêu thích')</script>";
            echo "<script type='text/javascript'>window.top.location='./index.php?act=sanpham&&action=chitiet&&id=$id';</script>";
        }else{
            include "./View/sanphamyeuthich.php";
        }
        break;
}
?>