<?php 
if(!isset($_SESSION['dsyeuthich'])){
    $_SESSION['dsyeuthich']=[];
}
$ctrl="";
if(isset($_GET['action'])){
    $ctrl=$_GET['action'];
}
switch($ctrl){
     case "yeuthich":
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $db = new danhsachyeuthich();
            if(isset($_SESSION['dsyeuthich']) && count($_SESSION['dsyeuthich'])>=1){
                foreach($_SESSION['dsyeuthich'] as $e){
                    echo $e['id'];
                    if($e['id']==$id){
                        echo "<script>alert('Sản phẩm đã tồn tại trong danh sách yêu thích')</script>";
                        echo "<script type='text/javascript'>window.top.location='./index.php?act=sanpham&&action=chitiet&&id=$id';</script>";
                        return;
                    };
                }
                        $db->them($id);
                        echo "<script>alert('Đã thêm vào danh sách yêu thích')</script>";
                        echo "<script type='text/javascript'>window.top.location='./index.php?act=sanpham&&action=chitiet&&id=$id';</script>";
            }else{
                $db->them($id);
                echo "<script>alert('Đã thêm vào danh sách yêu thích')</script>";
                echo "<script type='text/javascript'>window.top.location='./index.php?act=sanpham&&action=chitiet&&id=$id';</script>";
            }
           
        }else{
            include "./View/sanphamyeuthich.php";
        }
        break;
      case "xoayeuthich"  :
        if(isset($_GET['index'])){
            $index=$_GET['index'];
            $db=new danhsachyeuthich();
            $db->xoa($index);
        }
        include "./View/sanphamyeuthich.php";
}
?>