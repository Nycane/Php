<?php 
if($_GET['type']=="add"){
  $ac=1;
}else{
  $ac=0;
}
?>
<div class="container">
  <div class="row">
    <div class="col-12">
    <!--  -->
    <div class="card mt-3">
        <div class="card-header info mb-3">
          QUẢN LÝ LOẠI HÀNG
        </div>
        <form class="ml-4" action="index.php?act=sanpham_admin&action=import" method="post"  enctype="multipart/form-data">
            <input type="file" name="img">
            <button type="submit" name="import">Import</button>
        </form>
        <?php
        if($ac==1){
          echo '<form action="index.php?action=addloaisp&act=sanpham_admin" method="post">';
        } else{
          echo '<form action="index.php?action=updateloaisp&act=sanpham_admin" method="post">';
        }
        ?>

        <div class="card-body">
            <div class="form-group">
              <?php
                if($ac==1){
              ?>
                <label for="">Mã Loại</label>
                <input type="text" readonly name="maloai" class="form-control" >
                <?php }else{
                  if(isset($_GET['idloai'])){
                    $idloai=$_GET['idloai'];
                    $db = new sanpham_admin();
                    $row=$db->getInstanceSp($idloai);
                    
                  }
                  ?>
                   <label for="">Mã Loại</label>
                <input type="text" value="<?php echo $row['MaLoai'];?>" readonly name="maloai" class="form-control" >
                  <?php 
                };
                  ?>
              </div>
              <div class="form-group">
                <?php
                    if($ac==1){
                ?>
                <label for="">Tên Loại Sản Phẩm</label>
                <input type="text" name="tenloai" class="form-control">
                        <?php }else{?>
                          <label for="">Tên Loại Sản Phẩm</label>
                <input type="text" value="<?php  echo $row['TenLoai'];?>" name="tenloai" class="form-control">
                          <?php };?>
              </div>
              <div class="form-group">
                <?php
                    if($ac==1){
                ?>
               <label for="" class="d-block">Danh Mục</label>
                          <select class="form-control" style="width:150px" name="iddanhmuc" >
                            <?php
                            $db = new sanpham_admin();
                            $result=$db->getDanhMuc();
                              while($set=$result->fetch()):
                            ?>
                            <option value="<?php echo $set['id']?>"><?php  echo $set['tendanhmuc']?></option>
                            <?php  endwhile; ?>
                          </select>
                        <?php }else{?>
                          <label for="" class="d-block">ID Danh Mục</label>
                          <select class="form-control" style="width:150px" name="iddanhmuc" >
                            <?php
                            $result=$db->getDanhMuc();
                              while($set=$result->fetch()):
                            ?>
                            <option <?php echo $row['id_danhmuc']==$set['id']?"selected":"" ?> value="<?php echo $set['id']?>"><?php  echo $set['tendanhmuc']?></option>
                            <?php  endwhile; ?>
                          </select>
                          <?php };?>
              </div>
              <!-- <div class="form-group">
                <label for="">Menu số:</label>
                <input type="text" name="menu"  class="form-control">

              </div> -->

              <div class="form-group">
                <?php
                 if($ac==1){
                 echo '<button type="submit" class="btn btn-primary">Thêm</button>';
                 }else{
                  echo '<button type="submit" class="btn btn-primary">Lưu</button>';
                 }
                ?>
                  <!-- <a href="" class="btn btn-danger">Danh sách</a> -->
              </div>
          </form>
        </div>
      </div>
    <!--  -->
    </div>
  </div>
</div>

