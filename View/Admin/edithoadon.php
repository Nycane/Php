<?php 
  
?>
<div class="container">
<div class="row">
  <div class="col-12 ">
    <form action="index.php?act=hoadon_admin&action=edithd" method="post">
  <table class="table" style="border:;">
    <?php
      if(isset($_GET['id'])){
        $ad=new hoadon_admin(); 
        $id=$_GET['id'];
        $kq=$ad->getHdById($id);
        while($row =$kq->fetch()):
    ?>
    <!-- cap nhat -->
    <tr>
        <td>ID</td>
        <td><input type="text" readonly class="form-control" name="iddh" value="<?php echo $row['id'] ?>"  readonly maxlength="100px"></td>
      </tr>
      <tr>
        <td>Họ Tên</td>
        <td><input type="text" class="form-control" value="<?php echo $row['hoten'] ?>" disabled  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Ngày Đặt</td>
        <td><input type="text" value="<?php echo $row['ngaydat'] ?>" class="form-control" disabled  >
        </td>
      </tr>
      <tr>
        <td>Thành Tiền</td>
        <td><input type="text" value="<?php echo $row['thanhtien'];?>" class="form-control"disabled   >
        </td>
      </tr>
      <tr>
        <td>Trạng Thái</td>
        <td>
        <select name="trangthai" class="form-control" style="width:300px" id="">
              <?php
                 $result=$ad->getTrangThai();
                 while($row1=$result->fetch()):
              ?>
              <option <?php echo $row['trangthai']==$row1['trangthai']?"selected":"";?> value="<?php echo $row1['trangthai']?>"><?php if($row1['trangthai']==0)
              {
                echo "Chờ xử lý";
                }else{
                    echo "Đã xử lý";
                }
                ?></option>
              <?php endwhile;?>
            </select>
        </td>
      </tr>
    <!-- cap nhat -->
      <?php endwhile;?>
        <!-- THem -->
        <!-- THem -->
        <?php };?>
      <tr>
        <td colspan="2">
          <input type="submit" name="gui" value="submit">
        </td>
      </tr>
    </table>
   </form>
  </div>
</div>
</div>
