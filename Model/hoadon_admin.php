<?php 
class hoadon_admin{
    public function getAllHdPage($start,$limit){
        $db = new connect();
 $select="SELECT username.hoten,donhang.id,donhang.ngaydat,donhang.thanhtien,donhang.trangthai from donhang,username where donhang.id_user=username.id     limit $start,$limit";
        return $db->getlist($select);
    }
    public function getAllHd(){
        $db = new connect();
        $select="SELECT username.hoten,donhang.id,donhang.ngaydat,donhang.thanhtien from donhang,username where donhang.id_user=username.id";
        return $db->getlist($select);
    }
    public function getAllCthd($start,$limit){
        $db= new connect();
        $select="SELECT chitiet_donhang.id_donhang as id,donhang.ngaydat,sanpham.tensp,username.hoten,username.diachi,username.dienthoai,chitiet_donhang.soluongmua,chitiet_donhang.mausac,chitiet_donhang.size,chitiet_donhang.thanhtien From donhang,sanpham,chitiet_donhang,username Where sanpham.id=chitiet_donhang.id_sanpham and donhang.id=chitiet_donhang.id_donhang and donhang.id_user=username.id limit $start,$limit";
        $result=$db->getlist($select);
        return $result;
    }
    public function getAllCthdId($start,$limit,$id){
        $db= new connect();
        $select="SELECT chitiet_donhang.id_donhang as id,donhang.ngaydat,sanpham.tensp,username.diachi,username.dienthoai,username.hoten,chitiet_donhang.soluongmua,chitiet_donhang.mausac,chitiet_donhang.size,chitiet_donhang.thanhtien From donhang,sanpham,chitiet_donhang,username Where sanpham.id=chitiet_donhang.id_sanpham and donhang.id=chitiet_donhang.id_donhang and donhang.id_user=username.id and chitiet_donhang.id_donhang=$id limit $start,$limit";
        $result=$db->getlist($select);
        return $result;
    }
    public function countAllCthd(){
        $db= new connect();
        $select="SELECT * from chitiet_donhang";
        $result=$db->getlist($select);
        return $result;
    }
    public function countAllCthdId($id){
        $db= new connect();
        $select="SELECT * from chitiet_donhang where id_donhang = $id";
        $result=$db->getlist($select);
        return $result;
    }
    public function getHdById($id){
        $db = new connect();
        $select="select username.hoten,donhang.id,donhang.ngaydat,donhang.thanhtien,donhang.trangthai from donhang,username where donhang.id_user=username.id and donhang.id =$id";
        $kq=$db->getctsp($select);
        return $kq;
    }
    public function getTrangThai(){
        $db = new connect();
        $select="select distinct(trangthai) from donhang";
        $kq=$db->getctsp($select);
        return $kq;
    }
    public function updateTrangThai($id,$tt){
        $db = new connect();
        $select="update donhang set trangthai=$tt where id=$id";
        $kq=$db->getctsp($select);
        return $kq;
    }
    
    
}
?>