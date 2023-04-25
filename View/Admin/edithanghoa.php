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
  
      if($ac==1){
        echo '<h1 class="text-center mt-5 mb-5">Cập Nhật Sản Phẩm</h1>';
      } else{
        echo '<h1 class="text-center mt-5 mb-5">Thêm Sản Phẩm</h1>';
      }
    ?>
    <?php
    if($ac==1){
     echo'<form action="index.php?act=sanpham_admin&action=capnhat&type=capnhat" method="post" enctype="multipart/form-data">';
    } else{
     echo'<form action="index.php?act=sanpham_admin&action=them&type=them" method="post" enctype="multipart/form-data">';
    }
    ?>
  <table class="table" style="border:;">
    <?php
      if(isset($_GET['id'])){
        $ad=new sanpham_admin(); 
        $id=$_GET['id'];
        $kq=$ad->getInstance($id);
        while($row =$kq->fetch()):
    ?>
    <!-- cap nhat -->
      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" value="<?php echo $row['id'] ?>" name="id"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" value="<?php echo $row['tensp'] ?>" name="tensp"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Loại Sản Phẩm</td>
        <td>
        <select name="loaisp" class="form-control" style="width:300px" id="">
              <?php
                 $result=$ad->getAllLoaiSp();
                 while($row1=$result->fetch()):
              ?>
              <option <?php echo  $row['id_loai']==$row1['MaLoai']?"selected":"";?> value="<?php echo $row1['MaLoai']?>"><?php echo $row1['TenLoai']?></option>
              <?php endwhile;?>
            </select>
        </td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" value="<?php echo $row['gia'] ?>" name="gia" ></td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="text" class="form-control" value="<?php echo $row['giamgia'] ?>" name="giamgia" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
            <label><img width="50px" height="50px" src="./View/Anh/<?php echo $row['img']?>"></label>
            Chọn file để upload:
            <input type="file"  name="image" id="fileupload">
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" value="<?php echo $row['slton'] ?>" class="form-control" name="slton" >
        </td>
      </tr>
      <tr>
        <td>Màu sắc</td>
        
        <td><input type="text" value="<?php echo $row['mausac'] ?>" class="form-control" name="mausac" >
        </td>
      </tr>
      <tr>
        <td>Size</td>
        <td><input type="text" value="<?php echo $row['size'] ?>" class="form-control" name="size" >
        </td>
      </tr>
    <!-- cap nhat -->

      <?php endwhile; }else{ ?>
        <!-- THem -->
        <tr>
        <td>Mã hàng</td>
        <td> <input type="text"  class="form-control" readonly  /></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" name="tensp" class="form-control"   maxlength="100px"></td>
      </tr>
      <tr>
      <tr>
        <td>Loại Sản Phẩm</td>
        <td>
        <select name="idloaisp" class="form-control" style="width:300px" id="">
              <?php
                 $ad=new sanpham_admin(); 
                 $result=$ad->getAllLoaiSp();
                 while($row1=$result->fetch()):
              ?>
              <option value="<?php echo $row1['MaLoai']?>"><?php echo $row1['TenLoai']?></option>
              <?php endwhile;?>
            </select>
        </td>
      </tr>
        <td>Đơn giá</td>
        <td><input type="text" name="gia" class="form-control"  name="dongia" ></td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="text" name="giamgia" class="form-control"  name="giamgia" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
        
            <label><img width="50px" id="img" height="50px" src=""></label>
            Chọn file để upload:
            <input type="file"  name="image" id="fileupload">
           <script>
            let inputimg=document.getElementById('fileupload');
            inputimg.onchange=function(e){
            let result=e.target.value.slice(12);
            let file="./View/Anh/".concat(result);
            console.log(file);
            let img =document.getElementById('img');
            img.src=file;
            console.log(img);
            }
           </script>
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" name="slton" class="form-control" name="slt" >
        </td>
      </tr>
      <tr>
        <td>Màu sắc</td>
        <td>
        <select name="mausac" id="" class="form-control" style="width:300px">
          <option value="Xanh">Xanh</option>
          <option value="Đỏ">Đỏ</option>
          <option value="Tím">Tím</option>
          <option value="Vàng">Vàng</option>
          <option value="Trắng">Trắng</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>Size</td>
        <td>
        <select name="size" id="" class="form-control" style="width:300px">
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">37</option>
          <option value="38">38</option>
          <option value="39">39</option>
        </select>
        </td>
      
      </tr>
        <!-- THem -->
        <?php }?>
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

