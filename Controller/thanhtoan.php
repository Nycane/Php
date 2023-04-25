<?php 
    if(isset($_GET['action'])){
        if(isset($_SESSION['id']) && count($_SESSION['cart'])>0){
            $dh=new thanhtoan();
            $date = new Datetime('now');
            $createdate=$date->format('Y-m-d');
            $iddh=$dh->themdonhang($_SESSION['id'],$createdate);
            $total=0;
            foreach($_SESSION['cart'] as $key => $e){
                $dh->themchittietdonhang($iddh,$e['id'],$e['soluong'],$e['mausac'],$e['size'],$e['thanhtien']);
                $total+=$e['thanhtien'];
                $dh->capnhatsoluong($e['id'],$e['soluong']);
            }
            $_SESSION['iddh']=$iddh;
            $dh->capnhattongtien($iddh,$total);
            unset($_SESSION['cart']);
            echo "<script>alert('Thanh Toán Thành Công')</script>";
            // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=thanhtoan"/>';
            echo "<script type='text/javascript'>window.top.location='./index.php?act=thanhtoan';</script>";

            
        }else{
            echo "<script>alert('Vui Lòng Đăng Nhập Để Thanh Toán')</script>";
        include "./View/dangnhap_user.php";
        }  
    }else{
        include "./View/thanhtoan.php";
    }


 
?>