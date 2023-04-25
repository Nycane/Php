<?php 
if(isset($_GET['type'])){
  if($_GET['type']=="capnhat"){
    $ac=1;
  }else{
    $ac=2;
  }
}
  
?>
<div class="container">
<div class="row">
  <div class="col-12 ">
    <?php
    if(isset($ac)){
      if($ac==1){
        echo '<h1 class="text-center mt-5 mb-5">Cập Nhật Thành Viên</h1>';
      } else{
        echo '<h1 class="text-center mt-5 mb-5">Thêm Thành Viên</h1>';
      }
      }
      
    ?>
    <?php
    if($ac==1){
     echo '<form action="index.php?act=thanhvien&action=capnhat&type=capnhat" method="post">';
    } else{
     echo '<form action="index.php?act=thanhvien&action=them&type=them" method="post" >';
    }
    ?>
  <table class="table" style="border:;">
    <?php
      if(isset($_GET['id'])){
        $ad=new thanhvien_admin(); 
        $id=$_GET['id'];
        $kq=$ad->getTvInstance($id);
        while($row =$kq->fetch()):
    ?>
    <!-- cap nhat -->
    <tr>
        <td>ID Thành Viên</td>
        <td><input type="text" readonly class="form-control" value="<?php echo $row['id'] ?>" name="idtv"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Tên Thành Viên</td>
        <td><input type="text" class="form-control" value="<?php echo $row['admin_name'] ?>" name="tentv"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" value="<?php echo $row['email'] ?>" class="form-control" name="email" >
        </td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" value="<?php echo $row['pass'] ?>" class="form-control" name="password" >
        </td>
      </tr>
      <tr>
        <td>Vai Trò</td>
        <td>
        <select name="vaitro" class="form-control" style="width:300px" id="">
              <?php
                 $result=$ad->getphanquyen();
                 while($row1=$result->fetch()):
              ?>
              <option <?php echo  $row['vaitro']==$row1['id']?"selected":"";?> value="<?php echo $row1['id']?>"><?php echo $row1['vaitro']?></option>
              <?php endwhile;?>
            </select>
        </td>
      </tr>
    
     
    <!-- cap nhat -->

      <?php endwhile; }else{ ?>
        <!-- THem -->
       
      <tr>
        <td>Tên Thành Viên</td>
        <td><input type="text" name="tentv" class="form-control"   maxlength="100px"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" class="form-control" name="email" >
        </td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" class="form-control" name="password" >
        </td>
      </tr>
      <tr>
        <td>Vai Trò</td>
        <td>
        <select name="vaitro" class="form-control" style="width:300px" id="">
              <?php
                 $ad=new thanhvien_admin(); 
                 $result=$ad->getphanquyen();
                 while($row1=$result->fetch()):
              ?>
              <option value="<?php echo $row1['id']?>"><?php echo $row1['vaitro']?></option>
              <?php endwhile;?>
            </select>
        </td>
      </tr>
     
    
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
