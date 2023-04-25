<?php 
    $act = "";
    if(isset($_GET['action'])){
        $act=$_GET['action'];
    }
    switch($act){
        case "dangnhap_admin":
             include "./View/$act.php";
             break;
        case "dangnhap_admin_act":
                    $admin = new admin();
                if(isset($_POST['email'])&&isset($_POST['password'])){
                    $email=$_POST['email'];
                    $password=md5($_POST['password']);
                    $kq=$admin->dangnhap($email,$password);
                    if($kq!=false){
                        $_SESSION['admin_name']=$kq['admin_name'];
                        $_SESSION['admin_id']=$kq['id'];
                        $pq= new thanhvien_admin();
                        $set=$pq->getvaitro($kq['vaitro']);
                        $_SESSION['vaitro']=$set['vaitro'];
                        echo "<script>alert('Đăng nhập thành công')</script>";
                        // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=sanpham_admin"/>';
                        // include "./View/Admin/hanghoa.php";
                        echo "<script type='text/javascript'>window.location='./index.php?act=sanpham_admin&action=hanghoa';</script>";
                    }else{
                        echo "<script>alert('Đăng nhập không thành công')</script>";
                        include "./View/dangnhap_admin.php";
                    }
                    
                }
                break;
               case "dangxuat":
                    unset($_SESSION['admin_name']);
                    unset($_SESSION['admin_id']);
                    echo "<script type='text/javascript'>window.top.location='./index.php?act=trangchu';</script>";
                    break;
                case "tdmk":
                    if(isset($_POST['mkcu']) && isset($_POST['mkmoi'])&& isset($_POST['nlmkmoi'])){
                           $ad = new admin();
                            $result=$ad->validateTdmk($_POST['mkcu'],$_POST['mkmoi'],$_POST['nlmkmoi']);
                            if($result==true){
                               $kq=$ad->thaydoimatkhau($_SESSION['admin_id'],md5($_POST['mkmoi']));
                                  echo "<script>alert('Thay Đổi Mật Khẩu Thành Công')</script>";
                                  unset($_SESSION['admin_name']);
                                  unset($_SESSION['admin_id']);
                    echo "<script type='text/javascript'>window.top.location='./index.php?act=login_admin&action=dangnhap_admin';</script>";
                                // include "./View/dangnhap_admin.php";
                                return;
                            }
                    }
                    include "./View/Admin/tdmk.php";
                    break;


    }

?>