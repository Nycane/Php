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
$count = $hd->getAllHd()->rowCount();
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
                <h1 class="text-center" >Danh Sách Hóa Đơn</h1>
    <a href="index.php?act=hoadon_admin&action=cthd">Chi Tiết Hóa Đơn</a>
                <table class="table table-striped table text-center">
                <thead class="bg-info">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Thành Tiền</th>
                    <th scope="col">Trạng Thái</th>
                    <th colspan=3>Tùy Chọn</th>
                    </tr>
                </thead>
              
                <tbody class="">
                <?php 
                $hd= new hoadon_admin();
                $kq=$hd->getAllHdPage($start,$limit);
                while($row=$kq->fetch()):
                ?>
                    <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['hoten'] ?></td>
                    <td><?php echo $row['ngaydat'] ?></td>
                    <td><?php echo number_format($row['thanhtien']) ?> VND</td>
                    <td><?php if($row['trangthai']==1){
                        echo "Đã Xử Lý";
                    }else{
                        echo "Chờ Xử Lý";
                    } ?></td>
                    <?php 
                       if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):

                    ?>
                    <td><a class="btn btn-danger" href="index.php?act=hoadon_admin&action=sua&id=<?php echo $row['id']?>">Sửa</a></td>
                    <?php endif; ?>

                    <td><a class="btn btn-warning"  href="index.php?act=hoadon_admin&action=cthd&iddh=<?php echo $row['id'] ?>">Detail</a></td>
                    <?php 
                       if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):

                    ?>
                    <!-- <td><a class="btn btn-info" href="index.php?act=hoadon_admin&action=xoa">Xóa</a></td> -->
                    <?php endif; ?>
                    </tr>
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
    <li class="page-item"><a class="page-link" href="index.php?act=hoadon_admin&action=hoadon&page=<?php echo $currentPage-1?>">Previous</a></li>
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
    <li class="page-item"><a class="page-link" href="index.php?act=hoadon_admin&action=hoadon&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php };?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=hoadon_admin&action=hoadon&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=hoadon_admin&action=hoadon&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif; endif;?>
  </ul>
</nav>
    <!-- phantrang -->

    
</body>
</html>