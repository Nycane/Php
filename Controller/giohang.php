<?php  
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}
        $ctrl="";
            if(isset($_GET['action'])){
                $ctrl=$_GET['action'];
            }
            switch($ctrl){
                    case "them":                  
                        if(isset($_POST['id'])){
                            $id=$_POST['id'];
                            $mausac=$_POST['mausac'];
                            if(!empty($_POST['size'])){
                                $size=$_POST['size'];
                            }else{
                                $size=35;
                            }
                            $sl=$_POST['soluong'];                           
                            if(count($_SESSION['cart'])>0){
                                foreach($_SESSION['cart'] as $key => $v){
                                    if($v['id']==$id && $v['size']==$size && $v['mausac']==$mausac){
                                        $_SESSION['cart'][$key]['soluong']+=$sl;
                                          $_SESSION['cart'][$key]['thanhtien']=$_SESSION['cart'][$key]['soluong']*$_SESSION['cart'][$key]['gia'];
                                        //   echo '<meta http-equiv="refresh" content="0; url=./index.php?act=giohang"/>';
                                        echo "<script type='text/javascript'>window.location='./index.php?act=giohang';</script>";
                                        exit; // dừng các mã chạy phía dưới;
                                        //   include "./View/giohang.php";
                                          return;
                                    }
                            }
                            $gh = new giohang();
                            $gh->additem($id,$mausac,$size,$sl);                                
                            } 
                            else{
                                $gh = new giohang();
                                $gh->additem($id,$mausac,$size,$sl);                                
                            }
                        }     
                        // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=giohang"/>';
                        echo "<script type='text/javascript'>window.location='./index.php?act=giohang';</script>"; 


                        
                        // include "./View/giohang.php";

                    break;
                    case "xoa":
                        $gh = new giohang();
                        if(isset($_GET['id'])){
                            $gh->xoa($_GET['id']);
                        }                        
                        // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=giohang"/>';
                        echo "<script type='text/javascript'>window.location='./index.php?act=giohang';</script>"; 

                        // include "./View/giohang.php";

                       break;
                     case "sua":
                        if(isset($_POST['newsl'])){
                            $sl=$_POST['newsl'];
                            foreach($sl as $key=> $e){
                                if($_SESSION['cart'][$key]['soluong']!=$e){
                                    $gh= new giohang();
                                    $gh->sua($key,$e);
                                }
                            }
                        }
                        // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=giohang"/>';
                        echo "<script type='text/javascript'>window.location='./index.php?act=giohang';</script>";



                        // include "./View/giohang.php";

                     break;          
                     default:
                     include "./View/giohang.php";

            }

?>