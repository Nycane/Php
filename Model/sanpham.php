<?php 
class sanpham{
    public function __construct(){
    }

       public function getspbc(){
            $db = new connect();
            $select ="SELECT sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img from chitiet_donhang ,sanpham WHERE chitiet_donhang.id_sanpham=sanpham.id GROUP by id_sanpham HAVING SUM(chitiet_donhang.soluongmua) ORDER by sum(soluongmua) DESC limit 4;";
            return $db->getList($select);
             
        }
       
        public function getsppb(){
            $db = new connect();
            $select ="SELECT * FROM sanpham WHERE disabled=0 and nhomsp ='sppb'";
            return $db->getList($select);
        }
        public  function getspm(){
            $db = new connect();
            $select ="SELECT * FROM sanpham Where disabled=0 and nhomsp='spm'";
            return $db->getList($select);
        }
        public  function getpkk(){
            $db = new connect();
            $select = "SELECT sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia,sanpham.size,sanpham.mausac,sanpham.slton from sanpham,loai,danhmucsanpham where disabled=0 and sanpham.id_loai=loai.MaLoai and loai.id_danhmuc=danhmucsanpham.id and danhmucsanpham.id=2 limit 8";
            return $db->getList($select);
        }
        public function getpkgg(){
            $db = new connect();
            $select = "SELECT * FROM sanpham Where disabled =0 and giamgia>0 limit 8";
            return $db->getList($select);
        }
        public function getpkggAll(){
            $db = new connect();
            return $db->getList("SELECT * FROM sanpham Where disabled =0 and  nhomsp='spgg'");
        }
        public function getpkkAll(){
            $db = new connect();
            return $db->getList("SELECT sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia,sanpham.size,sanpham.mausac,sanpham.slton from sanpham,loai,danhmucsanpham where disabled =0 and sanpham.id_loai=loai.MaLoai and loai.id_danhmuc=danhmucsanpham.id and danhmucsanpham.id=2");
        }
        public function getctsp($id){
            $db = new connect();
            $select="SELECT * FROM sanpham where id=$id";
           $result= $db->getctsp($select);
           return $result->fetch();
        }
        public function getmau($idloai){
            $db = new connect();
            $select="SELECT DISTINCT mausac FROM sanpham where id_loai=$idloai";
            return $db->getlist($select);
        }
        public function getsize($idloai){
            $db = new connect();
            $select="SELECT DISTINCT size FROM sanpham where id_loai=$idloai ORDER BY size";
            return $db->getlist($select);
        }
        public function getListSpggOnPage($start,$limit){
            $db = new connect();
            $select = "SELECT * FROM sanpham where disabled=0 and giamgia>0  limit ".$start.",".$limit;
            $result=$db->getlist($select);
            return $result;
        }
        public function getListSpggorder($start,$limit,$order){
            $db = new connect();
            $select = "SELECT * FROM sanpham where disabled=0 and  giamgia>0  order by gia $order limit ".$start.",".$limit;
            $result=$db->getlist($select);
            return $result;
        }
        public function getListPkkOnPage($key,$start,$limit){
            $db = new connect();
            $select = "SELECT sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia,sanpham.size,sanpham.mausac,sanpham.slton from sanpham,loai,danhmucsanpham where disabled =0 and sanpham.id_loai=loai.MaLoai and loai.id_danhmuc=danhmucsanpham.id and danhmucsanpham.id=2 limit $start,$limit";
            $result=$db->getlist($select);
            return $result;
        }
        public function getListPkkOrder($key,$start,$limit,$order){
            $db = new connect();
            $select = "SELECT sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia,sanpham.size,sanpham.mausac,sanpham.slton from sanpham,loai,danhmucsanpham where disabled=0 and sanpham.id_loai=loai.MaLoai and loai.id_danhmuc=danhmucsanpham.id and danhmucsanpham.id=2  order by gia $order limit $start,$limit";
            $result=$db->getlist($select);
            return $result;
        }
        public function timKiemSanPham($key,$start,$limit){
                $db = new connect();
                $select="SELECT * FROM sanpham where disabled=0 and  tensp like'%$key%' limit $start,$limit";
                $result = $db->getlist($select);
                return $result;
        }
        public function getspsearch($key){
            $db = new connect();
            $select ="SELECT * FROM sanpham where disabled =0 and  tensp like'%$key%'";
            return $db->getList($select);
        }
        public function ktsoluongton($id){
            $db = new connect();
            $select ="select slton from sanpham where id=$id";
           $kq= $db->getctsp($select);
           return $kq->fetch();
        }
}
?>