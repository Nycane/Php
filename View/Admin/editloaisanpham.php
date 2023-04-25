<?php
$ad = new sanpham_admin();
$count = $ad->getAllLoaiSp()->rowCount();
$limit=9;
$pg = new page();
$page = $pg->getTotalPage($count,$limit);
$currentPage=isset($_GET['page'])?$_GET['page']:1;
$start=$pg->getStart($currentPage,$limit);
echo $start;
echo $currentPage;
?>
<form name="frmloaihang" action="" method="post">
  <div class="card mt-3">
    <div class="card-header">
      QUẢN LÝ LOẠI HÀNG
    </div>
    <div class="card-body">
      <table class="table table-striped table">
        <thead>
          <tr class="bg-info">
            <th scope="col">Mã loại</th>
            <th scope="col">Tên loại</th>
            <th scope="col">ID Danh Mục</th>
            <?php 
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):
        ?>
            <th scope="col"></th>
            <?php endif;?>

          </tr>
        </thead>
        <tbody>
              <?php 
              $kq = $ad ->getLoaiSp($start,$limit);
              while($row=$kq->fetch()):

               ?>
                    <tr>
                      <td><?php echo $row['MaLoai'] ?></td>
                      <td><?php echo $row['TenLoai']; ?></td>
                      <td><?php 
                      $dm = new sanpham_admin();
                      $set=$dm->getNameDm($row['id_danhmuc']);
                      echo $set['tendanhmuc'];
                      ?></td>
                        <?php
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):
      ?>
                      <td>
                        <a href="index.php?act=sanpham_admin&action=xoaloaisp&idloai=<?php echo $row['MaLoai'];?>" class="btn btn-warning">Xoá</a>
                        <a href="index.php?act=sanpham_admin&action=updateloaisp&type=update&idloai=<?php echo $row['MaLoai'];?>" class="btn btn-info">Sửa</a>
                      </td>
                      <?php endif;?>
                    </tr>
                    <?php  endwhile;?>
					
          <input type="hidden" name="xoa" value="" />
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <!-- <a href="" class="btn btn-info">Chọn tất cả</a>
      <button class="btn btn-info" onclick="">Chọn tất cả(javascript)</button>
      <a href="" class="btn btn-info">Bỏ chọn</a>
      <a href="" class="btn btn-info">Xóa danh mục đã chọn</a>
      <button class="btn btn-info" onclick="">Xóa danh mục đã chọn test</button> -->
      <!-- <button type="submit" class="btn btn-info">Xoá danh mục đã chọn</button> -->
      <?php
        if($_SESSION['vaitro']=="Admin"||$_SESSION['vaitro']=="Quản Lý"):
      ?>
      <a href="index.php?act=sanpham_admin&action=addloaisp&type=add" class="btn btn-info">Thêm mới</a>
      <?php endif;?>
    </div>
  </div>
</form>
<nav aria-label="Page navigation example">
  <ul class="pagination d-flex justify-content-center mt-3 mb-5">
  <?php 
     if($currentPage>1):
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&action=loaisp&page=<?php echo $currentPage-1?>">Previous</a></li>
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
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&action=loaisp&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php };?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=sanpham_admin&action=loaisp&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&action=loaisp&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif;?>
  </ul>
</nav>
