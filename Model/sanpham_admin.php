<?php 
class sanpham_admin{
    public function getAllSpLimit($start,$limit){
        $db = new connect();
        $select ="SELECT * from sanpham where disabled=0 limit $start,$limit ";
        return $db->getList($select);
    } 
    public function getAllSp(){
        $db = new connect();
        $select ="SELECT * from sanpham where disabled=0 ";
        return $db->getList($select);
    } 
    public function xoaSanPham($id){
        $db = new connect();
        $query="update sanpham set disabled=1  where id=$id";
        $kq=$db->themsuaxoa($query);
        return $kq;
    }
    public function getInstance($id){
        $db = new connect();
        $select="SELECT * FROM sanpham where id=$id";
       $result= $db->getctsp($select);
       return $result;
    }
    public function getImage($id){
        $db = new connect();
        $select ="select img from sanpham where id =$id";
      $kq=  $db->getctsp($select);
      return $kq->fetch();
    }
    public function capNhatSanPham($id,$tensp,$gia,$img,$giamgia,$size,$mausac,$slton,$maloai){
        $db = new connect();
        $query="update sanpham set tensp='$tensp',gia=$gia,img='$img',giamgia=$giamgia,size=$size,mausac='$mausac',slton=$slton,id_loai=$maloai where id =$id";
        $kq=$db->themsuaxoa($query);
        return $kq;
    }
    public function themSanPham($tensp,$gia,$img,$giamgia,$size,$mausac,$slton,$idloai){
        $db = new connect();
        $query="insert into sanpham (tensp,gia,img,giamgia,size,mausac,slton,id_loai)
        values('$tensp',$gia,'$img',$giamgia,$size,'$mausac',$slton,$idloai)";
       return $db->themsuaxoa($query);
    }
    public function getLoaiSp($start,$limit){
        $db =  new connect();
        $query="select * from loai limit $start,$limit";
       $kq= $db->getlist($query);
        return $kq;
    }
    public function getAllLoaiSp(){
        $db = new connect();
        $select ="SELECT * from loai ";
        return $db->getList($select);
    } 
    public function getInstanceSp($id){
        $db = new connect();
        $select = "select * from loai where MaLoai=$id";
        $kq=$db->getctsp($select);
        return $kq->fetch(); 
    }
    public function addLoaiSp($maloai,$tenloai,$iddanhmuc){
        $db = new connect();
        $select = "insert into loai (TenLoai,id_danhmuc) values('$tenloai',$iddanhmuc)";
        $kq=$db->getctsp($select);
        return $kq->fetch(); 
    }
    public function updateLoaiSp($maloai,$tenloai,$iddanhmuc){
        $db = new connect();
        $select = "update loai set TenLoai='$tenloai',id_danhmuc=$iddanhmuc where MaLoai=$maloai";
        $kq=$db->getctsp($select);
        return $kq->fetch(); 
    }
    public function getNameDm($iddm){
        $db= new connect();
        $select="select tendanhmuc from danhmucsanpham where id=$iddm";
        $kq= $db->getctsp($select);
        return $kq->fetch();
    }
    public function getNameLoai($idloai){
        $db= new connect();
        $select="select TenLoai from loai where MaLoai=$idloai";
        $kq= $db->getctsp($select);
        return $kq->fetch();
    }
    public function searchHangHoa($query,$start,$limit){
        $db= new connect();
        $select="select * from sanpham where disabled=0 and tensp like '%$query%' limit $start,$limit ";
        $kq= $db->getlist($select);
        return $kq;
    }
    public function getSearch($search){
        $db= new connect();
        $select="select * from sanpham where disabled=0 and tensp like '%$search%'";
        $kq= $db->getlist($select);
        return $kq;
    }
   public function xoaLoaiSp($id){
    $db = new connect();
    $query="Delete from loai where MaLoai=$id";
    $db->themsuaxoa($query);
   }
   public function getDanhMuc(){
    $db = new connect();
    $select = "select * from danhmucsanpham";
   return  $db->getlist($select);
   }
   public function thongkehanghoa(){
    $db = new connect();
    $select="SELECT sanpham.tensp,SUM(chitiet_donhang.soluongmua)as soluongban FROM chitiet_donhang,sanpham,donhang WHERE chitiet_donhang.id_donhang=donhang.id and chitiet_donhang.id_sanpham=sanpham.id GROUP by sanpham.tensp";
    return $db->getlist($select);
   }
   public function thongkehanghoathang($month,$year){
    $db = new connect();
    $select="SELECT sanpham.tensp,SUM(chitiet_donhang.soluongmua)as soluongban FROM chitiet_donhang,sanpham,donhang WHERE chitiet_donhang.id_donhang=donhang.id and chitiet_donhang.id_sanpham=sanpham.id and month(donhang.ngaydat)=$month and year(donhang.ngaydat)=$year GROUP by sanpham.tensp";
    return $db->getlist($select);
   }
   public function thongkehanghoatheothang($month,$year){
    $db = new connect();
    $select="SELECT sanpham.tensp,SUM(chitiet_donhang.soluongmua)as soluongban FROM chitiet_donhang,sanpham,donhang WHERE chitiet_donhang.id_donhang=donhang.id and chitiet_donhang.id_sanpham=sanpham.id and month(donhang.ngaydat)=$month and year(donhang.ngaydat)=$year GROUP by sanpham.tensp";
    return $db->getlist($select);
   }
    public function AddImg(){
        $targetDir="./View/Anh/";
        $targetFile=$targetDir.basename($_FILES['image']['name']);
        $imgFileType= strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        $flag=true;
        if(file_exists($targetFile)){
            echo "Hình Đã Tồn Tại";
            $flag=false;
        }else{
            $flag=true;
        }
        $check=getimagesize($_FILES["image"]["tmp_name"]);
        if($check!=true){
            echo "Đây Không Phải Là ảnh";
            $flag=false;
        }else{
            $flag=true;
        }
        if($_FILES['image']['size']>100000){
           echo" <script> alert('Hình Vượt quá kích thước cho phép')</script>" ;
            $flag=false;
        }else{
            $flag=true;
        }
        if($imgFileType!="jpg"&&$imgFileType != "png" &&$imgFileType !="git" && $imgFileType && "jpeg"){
            echo" <script> alert('Đây Không Phải Là Hình')</script>" ;
            $flag=false;
        }
        if($flag!=false){
               $kq= move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);
               if($kq==1){
                echo "Upload Thanh COng";
               }else{
                echo "Upload that bai";
               }
        }else{
            echo "Vui Long chon lai hinh";
        }
   

    }
}
?>