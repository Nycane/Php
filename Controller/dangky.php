<?php 
$act = "";
if(isset($_GET['action'])){
    $act=$_GET['action'];
}
switch($act){
    case "dangky_user":
        include "./View/$act.php";
        break;
    case "dangky_act":

                //     $validate= new user();
                //    $result=$validate->validate($_POST['hoten'],$_POST['email'],$_POST['password'],$_POST['nlpassword'],$_POST['diachi'],$_POST['phone']);
                   
                if(isset($_POST['hoten']) && isset($_POST['email']) && isset($_POST['password'])){
                    $hoten=$_POST['hoten'];
                    $email=$_POST['email'];
                    $pass=md5($_POST['password']); 
                    $diachi=$_POST['diachi'];
                    $sdt=$_POST['phone'];
                    $dk = new user();
                    $ktuser=$dk->getuser($email);     
                    if($ktuser){
                        echo "<script>alert('Tài Khoản Này Đã Tồn Tại')</script>";
                        include "./View/dangky_user.php";
                        return;
                    }
                    $result=$dk->dangky($hoten,$email,$pass,$diachi,$sdt);
                    if($result){
                      echo "<script>alert('Đăng ký thành công')</script>";
                         include "./View/trangchu.php";
                    }else{
                        echo "<script>alert('Đăng ký thất bại')</script>";
                         include "./View/trangchu.php";
                    }
                }
        break;

}

?>
