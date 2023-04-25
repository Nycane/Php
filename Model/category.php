<?php 
    class category{
        public function getCategory(){
            $db = new connect();
            $select = "select * from danhmucsanpham";
            return $db->getlist($select);
        }
        public function getGiay($iddm){
            $db = new connect();
            $select = "select sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia from danhmucsanpham,loai,sanpham where danhmucsanpham.id=loai.id_danhmuc and sanpham.id_loai=loai.MaLoai and danhmucsanpham.id=$iddm and sanpham.disabled=0";
            return $db->getlist($select);
        }
        public function getGiayPage($iddm,$start,$limit){
            $db = new connect();
            $select = "select sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia from danhmucsanpham,loai,sanpham where danhmucsanpham.id=loai.id_danhmuc and sanpham.id_loai=loai.MaLoai and danhmucsanpham.id =$iddm and sanpham.disabled=0 limit $start,$limit";
            return $db->getlist($select);
        }
        public function getPkk($iddm){
            $db = new connect();
            $select = "select sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia from danhmucsanpham,loai,sanpham where danhmucsanpham.id=loai.id_danhmuc and sanpham.id_loai=loai.MaLoai and danhmucsanpham.id =$iddm and sanpham.disabled=0";
            return $db->getlist($select);
        }
        public function getPkkPage($iddm,$start,$limit){
            $db = new connect();
            $select = "select sanpham.id,sanpham.tensp,sanpham.gia,sanpham.img,sanpham.giamgia from danhmucsanpham,loai,sanpham where danhmucsanpham.id=loai.id_danhmuc and sanpham.id_loai=loai.MaLoai and danhmucsanpham.id =$iddm and sanpham.disabled=0 limit $start,$limit" ;
            return $db->getlist($select);
        }
        
    }
?>