<?php
 $db = new sanpham_admin();
  if(isset($_POST['submit'])||isset($_SESSION['searchhanghoa'])){
    if(isset($_POST['submit'])){
      $_SESSION['searchhanghoa']=$_POST['searchhanghoa'];
    }
  $count = $db->getSearch($_SESSION['searchhanghoa'])->rowCount();
  }else{
  $count = $db->getAllSp()->rowCount();
  }
$limit=6;
$pg = new page();
$page = $pg->getTotalPage($count,$limit);
$currentPage=isset($_GET['page'])?$_GET['page']:1;
$start=$pg->getStart($currentPage,$limit);
echo $start;
echo $currentPage;
?>
<div class="container-fluid" style="margin-top:20px">

    <div class="col-12 text-center ">
<h3><b>DANH SÁCH HÀNG HÓA</b></h3>
    </div>
    <div class="row">
    <div class="col-6" >
  <?php 
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):

  ?>
<a href="index.php?act=sanpham_admin&action=them&type=them" class="text-dark"><h4>Thêm Sản Phẩm</h4></a>
<?php endif;?>
</div>
<div class="col-6">
  <!-- search -->
  <form action="index.php?act=sanpham_admin&action=hanghoa" method="post">
<div class="input-group justify-content-end mb-2">
  <div class="form-outline d-flex">
    <input type="search" id="form1" name="searchhanghoa" class="form-control" placeholder="Search..." />
    <input type="submit" name="submit" value="Search">
  </div>
</div>
</div>
</form>
</div>
  <!-- search -->

<div class="row" style="margin:0">
<table class="table-striped table table text-center">
    <thead class="bg-info">
      <tr >
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Loại Sản Phẩm</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th>Size</th>
        <th>Màu sắc</th>
        <th>Số lượng tồn</th>
        <?php 
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):

        ?>
        <th></th>
        <th></th>
        <?php endif;?>
      </tr>
    </thead>
  
    <tbody>
    <?php 
      if(isset($_POST['submit'])||isset($_SESSION['searchhanghoa'])){
        $kq=$db->searchHangHoa($_SESSION['searchhanghoa'],$start,$limit);
      }else{
        $kq= $db->getAllSpLimit($start,$limit);
      }
      while($row=$kq->fetch()):
    ?>
    <?php
    ?>
      <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo  $row['tensp'] ?></td>
        <td><?php
       $set=$db->getNameLoai($row['id_loai']);
       echo $set['TenLoai'];
        ?></td>
        <td><?php echo number_format($row['gia'])?> VND</td>
        <td><?php echo number_format($row['giamgia'])?> VND</td>
        <td><img width="50px" height="50px" src="./View/Anh/<?php echo $row['img'] ?>"/></td>
        <td><?php echo $row['size'] ?></td>
        <td><?php echo $row['mausac'] ?></td>
        <td><?php echo $row['slton'] ?></td>
        <?php 
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):

        ?>
        <td><a class="btn btn-danger" href="index.php?act=sanpham_admin&&action=capnhat&type=capnhat&id=<?php echo $row['id'] ?>">Cập nhật</a></td>
        <td><a class="btn btn-info" href="index.php?act=sanpham_admin&action=xoa&id=<?php echo $row['id']?>">Xóa</a></td>
        <?php endif;?>
      </tr>
     <?php endwhile; ?>
    </tbody>
  </table>
</div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination d-flex justify-content-center mt-3 mb-5">
  <?php 
      if($page>1):
     if($currentPage>1):
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&action=hanghoa&page=<?php echo $currentPage-1?>">Previous</a></li>
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
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&action=hanghoa&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php };?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=sanpham_admin&action=hanghoa&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&action=hanghoa&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif;?>
  </ul>
</nav>
<?php endif;?>
