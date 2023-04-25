<?php 
    class binhluan{
        function sendCmt($iduser,$cmt,$idsp,$rate){
                $db = new connect();
                 date_default_timezone_set('Asia/Ho_Chi_Minh');
                 $createdate =date('Y-m-d H:i:s') ;
                 if(empty($rate)){
                    $rate=0;
                 }
                $query="INSERT INTO danhgia_sanpham(id_sanpham,user_id,binhluan,rate,ngaycmt) 
                values($idsp,$iduser,'$cmt',$rate,'$createdate')";
                $result = $db->themsuaxoa($query);
                return $result;
        }
        function getCmt($idsp,$start,$limit){
                $db = new connect();
                $select="SELECT danhgia_sanpham.id,danhgia_sanpham.user_id,hoten,binhluan,ngaycmt,rate from danhgia_sanpham,username,sanpham where danhgia_sanpham.id_sanpham=sanpham.id and danhgia_sanpham.user_id=username.id and danhgia_sanpham.id_sanpham=$idsp order by ngaycmt desc limit $start,$limit";
                $result=$db->getlist($select);
                return $result;
            }
            function getCmtPagation($idsp){
                $db = new connect();
                $select="SELECT hoten,binhluan,ngaycmt,rate from danhgia_sanpham,username,sanpham where danhgia_sanpham.id_sanpham=sanpham.id and danhgia_sanpham.user_id=username.id and danhgia_sanpham.id_sanpham=$idsp";
                $result=$db->getlist($select);
                return $result;
            }
           function getrate($id){
            $db = new connect();
            $select="SELECT sum(rate)  from danhgia_sanpham where id_sanpham=$id";
            return $db->getctsp($select);
           }
           function getPeopleCmt($id){
            $db= new connect();
            $select="SELECT count(id_sanpham) FROM `danhgia_sanpham` WHERE id_sanpham=$id and rate>0";
            return $db->getctsp($select);
           }
           function Like($id){
            $db = new connect();
                $query="Update danhgia_sanpham set likes=likes+1 where id=$id";
            
            return $db->themsuaxoa($query);
           }
           function getLike($id,$id_sp,$user_id){
            $db = new connect();
            $query="Select likes from danhgia_sanpham where id=$id and id_sanpham=$id_sp and user_id=$user_id";
            return $db->getctsp($query);
           }
    }
?>