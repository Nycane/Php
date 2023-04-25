<?php 
class thanhtoan{
    public function __constructor(){

    }
    public function themdonhang($iduser,$createdate){
        $db = new connect();
        $query="INSERT into donhang(id_user,ngaydat,thanhtien,trangthai)
        VALUES('$iduser','$createdate',0,0)";
        $db->themsuaxoa($query);
        $queryiddh="SELECT id from donhang order by id desc limit 1";
        $iddh=$db->getctsp($queryiddh);
        $result=$iddh->fetch();
        return $result['id'];
    }
    public function themchittietdonhang($iddh,$idsp,$mausac,$soluong,$size,$thanhtien){
            $db = new connect();
            $query="INSERT into chitiet_donhang(id_donhang,id_sanpham,soluongmua,mausac,size,thanhtien)
            VALUES('$iddh','$idsp','$mausac','$soluong','$size','$thanhtien')"; 
            $db->themsuaxoa($query);
    }
    public function capnhattongtien($iddh,$total){
        $db = new connect();
        $query="UPDATE donhang SET thanhtien=$total WHERE id=$iddh";
        $db->themsuaxoa($query);
    }
    public function getuser($iddh){
        $db = new connect();
        $select ="SELECT hoten,email,diachi,dienthoai from username,donhang where donhang.id_user=username.id and donhang.id=$iddh";
        $result=$db->getctsp($select);
        return $result->fetch();
    }
    public function getdonhang($iddh){
        $db= new connect();
        $select="SELECT sanpham.tensp,chitiet_donhang.soluongmua,chitiet_donhang.mausac,chitiet_donhang.size,chitiet_donhang.thanhtien From sanpham,chitiet_donhang Where sanpham.id=chitiet_donhang.id_sanpham and chitiet_donhang.id_donhang=$iddh";
        $result=$db->getlist($select);
        return $result;
    }
    public function capnhatsoluong($id,$sl){
        $db= new connect();
        $query="update sanpham set slton=slton-$sl where id = $id";
        $db->themsuaxoa($query);
    }
    
}
?>