<?php
 $db = new thanhvien_admin();
$count = $db->getAllTv()->rowCount();
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
<h3><b>Danh Sách Thành Viên</b></h3>
    </div>
<div class="row col-12" >
<a href="index.php?act=thanhvien&action=them&type=them" class="text-dark"><h4>Thêm Thành Viên</h4></a>
</div>
<div class="row" style="margin:0">
<table class="table table-striped  table text-center">
    <thead class="bg-info">
      <tr>
        <th>ID</th>
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Password</th>
        <th>Vai Trò</th>
        <th colspan="2">Tùy Chọn</th>

      </tr>
    </thead>
  
    <tbody>
    <?php 
     
      $kq= $db->getAllTv($start,$limit);
      while($row=$kq->fetch()):
    ?>
      <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['admin_name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['pass']?></td>
        <td><?php 
        $row1=$db->getvaitro($row['vaitro']);
      echo $row1['vaitro'];
      
         ?></td>
        <td>
        <?php if($row['vaitro']!=0):?>
          <a class="btn btn-danger" href="index.php?act=thanhvien&&action=capnhat&type=capnhat&id=<?php 
        echo $row['id'] ?>">Cập Nhật</a>
        <?php endif;?>
        </td>
        <td>
        <?php if($row['vaitro']!=0):?>
          <a class="btn btn-info" href="index.php?act=thanhvienn&action=xoa&id=<?php echo $row['id']?>"><?php if($row['vaitro']!=0){echo "Xóa";}?></a>
          <?php endif;?>
        </td>
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
    <li class="page-item"><a class="page-link" href="index.php?act=thanhvien&page=<?php echo $currentPage-1?>">Previous</a></li>
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
    <li class="page-item"><a class="page-link" href="index.php?act=thanhvien&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php };?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=thanhvien&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham_admin&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif;endif;?>
  </ul>
</nav>
