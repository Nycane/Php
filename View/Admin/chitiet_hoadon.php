<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$hd = new hoadon_admin();
if(isset($_GET['iddh'])){
$count = $hd->countAllCthdId($_GET['iddh'])->rowCount();
}else{
$count = $hd->countAllCthd()->rowCount();
}
$limit=10;
$pg = new page();
$page = $pg->getTotalPage($count,$limit);
$currentPage=isset($_GET['page'])?$_GET['page']:1;
$start=$pg->getStart($currentPage,$limit);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <!-- table -->
                <h1 class="text-center mb-5">Chi Tiết Hóa Đơn</h1>
                <table class="table-striped table text-center">
                <thead class="bg-info text-center">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Điện Thoại</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Màu Sắc</th>
                    <th scope="col">Size</th>
                    <th scope="col">Thành Tiền</th>
                    <?php
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):
                     ?>
                    <!-- <th colspan=2>Tùy Chọn</th> -->
                    <?php
                        endif; 
                    ?>

                    </tr>
                </thead>
                <tbody class="text-center">
                <?php 
                $hd= new hoadon_admin();
                if(isset($_GET['iddh'])){
                    $iddh=$_GET['iddh'];
                    $kq=$hd->getAllCthdId($start,$limit,$iddh);

                }else{
                    $kq=$hd->getAllCthd($start,$limit);

                }
                while($row=$kq->fetch()):
                ?>
               
                    <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['hoten'] ?></td>
                    <td><?php echo $row['diachi'] ?></td>
                    <td><?php echo $row['dienthoai'] ?></td>
                    <td><?php echo $row['ngaydat'] ?></td>
                    <td><?php echo $row['tensp'] ?></td>
                    <td><?php echo $row['soluongmua'] ?></td>
                    <td><?php echo $row['mausac'] ?></td>
                    <td><?php echo $row['size'] ?></td>
                    <td><?php echo number_format($row['thanhtien']) ?> VND</td>
                    <?php
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):
      ?>
                    <!-- <td><a class="btn btn-danger" href="index.php?act=hoadon_admin&action=sua">Sửa</a></td>
                    <td><a class="btn btn-info" href="index.php?act=hoadon_admin&action=xoa">Xóa</a></td> -->
                    </tr>
                    <?php endif;?>
                <?php 
                endwhile;
                ?>
                </tbody>

                </table>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- phantrang -->
    <nav aria-label="Page navigation example">
  <ul class="pagination d-flex justify-content-center mt-3 mb-5">
  <?php 
  if($page>1):
     if($currentPage>1):
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=hoadon_admin&action=cthd&page=<?php echo $currentPage-1?>">Previous</a></li>
    <?php  endif;?>
    <!-- for -->
    <?php 
        for($i=1;$i<=$page;$i++):
     ?>
        <?php 
        if($i!=$currentPage){
        ?>
         <?php
        if($i>$currentPage-5&&$i<$currentPage+5){ 
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=hoadon_admin&action=cthd&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php };?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=hoadon_admin&action=cthd&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=hoadon_admin&action=cthd&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif; endif;?>
  </ul>
</nav>
    <!-- phantrang -->

    
</body>
</html>