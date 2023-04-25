<?php
class giohang{
                function additem($id,$mausac,$size,$soluong){
                            $gh = new sanpham();
                            $kq=$gh->getctsp($id);
                            if($kq['giamgia']>1){
                                $gia=$kq['giamgia'];
                            }else{
                                $gia=$kq['gia'];
                            }
                            $sanpham =array(
                                "id"=>$id,
                                "mausac"=>$mausac,
                                "size"=>$size,
                                "soluong"=>$soluong,
                                "img"=>$kq['img'],
                                "tensp"=>$kq['tensp'],
                                "gia"=>$gia,
                                "thanhtien"=>$gia*$soluong,
                            );
                            $_SESSION['cart'][]=$sanpham;

                }
                    function sua($id,$newsl){
                        
                        $_SESSION['cart'][$id]['soluong']=$newsl;
                        $_SESSION['cart'][$id]['thanhtien']=$_SESSION['cart'][$id]['soluong']*$_SESSION['cart'][$id]['gia'];
                        if($_SESSION['cart'][$id]['soluong']==0){
                            $this->xoa($id);                        
                        }
                    }
                function gettotal(){
                    $sum =0;
                    foreach($_SESSION['cart'] as $e){
                            $sum+=$e['thanhtien'];
                    }
                    return $sum;
                }
                function xoa($id){
                    unset($_SESSION['cart'][$id]);
                }
}
 ?>