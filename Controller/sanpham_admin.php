<?php 
$act="hanghoa";
if(isset($_GET['action'])){
    $act=$_GET['action'];
};
switch($act){

        case "hanghoa":
            include "./View/Admin/hanghoa.php";
            break;
        case "loaisp":
            include "./View/Admin/editloaisanpham.php";
            break;    
        case "addloaisp":
            if(isset($_POST['maloai'])&&isset($_POST['tenloai'])&&isset($_POST['iddanhmuc'])){
                $maloai=$_POST['maloai'];
                $tenloai=$_POST['tenloai'];
                $iddanhmuc=$_POST['iddanhmuc'];
                $db = new sanpham_admin();
                $db->addLoaiSp($maloai,$tenloai,$iddanhmuc);
                echo "<script>alert('Thêm Thành Công')</script>";
                echo "<script type='text/javascript'>window.location='./index.php?act=sanpham_admin&action=loaisp';</script>";
                return; 
            }
            include "./View/Admin/addloaisanpham.php";
            break;   
        case "updateloaisp":
            if(isset($_POST['maloai'])&&isset($_POST['tenloai'])&&isset($_POST['iddanhmuc'])){
                $maloai=$_POST['maloai'];
                $tenloai=$_POST['tenloai'];
                $db = new sanpham_admin();
                $db->updateLoaiSp($maloai,$tenloai,$_POST['iddanhmuc']);
                echo "<script>alert('Cập Nhật Thành Công')</script>";
                echo "<script type='text/javascript'>window.location='./index.php?act=sanpham_admin&action=loaisp';</script>"; 
                return;
            }
            include "./View/Admin/addloaisanpham.php";
            break;
         case "xoaloaisp":
            if(isset($_GET['idloai'])){
                $db =  new sanpham_admin();
                $db -> xoaLoaiSp($_GET['idloai']);
                echo "<script>alert('Xóa Thành Công')</script>";
                echo "<script type='text/javascript'>window.location='./index.php?act=sanpham_admin&action=loaisp';</script>"; 
                return;
            }   
        case "xoa":
            if(isset($_GET['id'])){
                $idsp=$_GET['id'];
                $ad=new sanpham_admin();
                $kq=$ad->xoaSanPham($idsp);
                if(!empty($kq)){
                    echo "<script>alert('Xóa Thành Công')</script>";
                    // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=sanpham_admin&action=hanghoa"/>';
                    echo "<script type='text/javascript'>window.top.location='./index.php?act=sanpham_admin&action=hanghoa';</script>";


                }else{
                    echo "<script>alert('Xóa Thành Công')</script>";
                    // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=sanpham_admin&action=hanghoa"/>';
                    echo "<script type='text/javascript'>window.top.location='./index.php?act=sanpham_admin&action=hanghoa';</script>";

                }
            }
        break;
        case "them":
            if(isset($_POST['gui'])){
                $tensp=$_POST['tensp'];
                $gia=$_POST['gia'];
                $img=$_FILES['image']['name'];
                $giamgia=$_POST['giamgia'];
                $size=$_POST['size'];
                $mausac=$_POST['mausac'];
                $slton=$_POST['slton'];
                $idloai=$_POST['idloaisp'];
                $ad = new sanpham_admin();
                if(!empty($_FILES['image']['name'])){
                    $ad->addImg();
                }
                $kq=$ad->themSanPham($tensp,$gia,$img,$giamgia,$size,$mausac,$slton,$idloai);
                if($kq==1){
                echo "<script>alert('Thêm thành công')</script>";
                include "./View/Admin/hanghoa.php";
                return;
                }else{
                    echo "<script>alert('Thêm Thất Bại')</script>";
                    include "./View/Admin/edithanghoa.php";
                    return;
                }
            }
            include "./View/Admin/edithanghoa.php";
            break;
        case "capnhat":
            if(isset($_POST['gui'])){
                $ad=new sanpham_admin();
                $id=$_POST['id'];
                $tensp=$_POST['tensp'];
                $gia=$_POST['gia'];
                $img=$_FILES['image']['name'];
                $giamgia=$_POST['giamgia'];
                $size=$_POST['size'];
                $mausac=$_POST['mausac'];
                $slton=$_POST['slton'];
                $maloai=$_POST['loaisp'];
                if(!empty($_FILES['image']['name'])){
                    $ad->AddImg();
                }else{
                    $result=$ad->getImage($id);
                    $img=$result['img'];
                }
                $kq=$ad->capNhatSanPham($id,$tensp,$gia,$img,$giamgia,$size,$mausac,$slton,$maloai);
                    echo "<script>alert('Cập nhật thành công')</script>";
                    include "./View/Admin/hanghoa.php";
                    return;
            }
            include "./View/Admin/edithanghoa.php";
            break;
            case "import":
                if(isset($_POST['import'])){
                    $file=$_FILES['img']['tmp_name'];
                    file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                    $file_open=fopen($file,'r');
                    while(($csv=fgetcsv($file_open,1000,','))!=false){
                        $db = new connect();
                        $tenloai=$csv[0];
                        $id_danhmuc=$csv[1];
                        $query="insert into loai(TenLoai,id_danhmuc) values('$tenloai',$id_danhmuc)";
                        $db->themsuaxoa($query);
                    echo "<script>alert('Import thành công')</script>";
                    echo "<script type='text/javascript'>window.location='./index.php?act=sanpham_admin&action=loaisp';</script>";

                    }
                }
                break;
}
?>