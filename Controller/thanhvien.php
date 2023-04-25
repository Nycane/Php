<?php 
$act ="thanhvien";
if(isset($_GET['action'])){
    $act=$_GET['action'];
}
switch($act){
    case "thanhvien":
        include "./View/admin/thanhvien.php";
        break;
     case "them":
        if(isset($_POST['tentv'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['vaitro'])){
          $tentv=$_POST['tentv'];
          $email=$_POST['email'];
          $pass=md5($_POST['password']);
          $vaitro=$_POST['vaitro'];
            $db = new thanhvien_admin();
            $kq=$db->verifyEmail($email);
            if(!empty($kq)){
              echo "<script>alert('Email Đã Tồn Tại')</script>";
              echo "<script type='text/javascript'>window.location='./index.php?act=thanhvien&action=them&type=them';</script>";

            }else{
                $db->addTv($tentv,$email,$pass,$vaitro);
                echo "<script>alert('Thêm Thành Công')</script>";
                echo "<script type='text/javascript'>window.location='./index.php?act=thanhvien&action=thanhvien';</script>";
                return; 
            }
        }
        include "./View/admin/addthanhvien.php"   ;
        break;
    case "capnhat":
        if(isset($_POST['tentv'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['vaitro'])&&isset($_POST['idtv'])){
            $idtv=$_POST['idtv'];
            $tentv=$_POST['tentv'];
            $email=$_POST['email'];
            $tv = new thanhvien_admin();
            $kq=$tv->verifyPassWord($idtv,$_POST['password']);
            if(!empty($kq)){
                $pass=$_POST['password'];
            }else{
                $pass=md5($_POST['password']);
            }
            $vaitro=$_POST['vaitro'];
              $db = new thanhvien_admin();
              $kq=$db->verifyEmailUpdate($email,$idtv);
                if(!empty($kq)){
                    echo "<script>alert('Email Đã Tồn Tại')</script>";
                    echo "<script type='text/javascript'>window.location='./index.php?act=thanhvien&action=capnhat&type=capnhat&id=$idtv';</script>";

                }else{
                    $db->updateTv($idtv,$tentv,$email,$pass,$vaitro);
                    echo "<script>alert('Cập Nhật Thành Công')</script>";
                    echo "<script type='text/javascript'>window.location='./index.php?act=thanhvien&action=thanhvien';</script>";
                    return;
                }
        }
        include "./View/admin/addthanhvien.php";
        break;    
     case "xoa":
        break;   

}

?>