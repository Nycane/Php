
    <style>
        .home{
            color:white;
            background-color: #C30005;
            padding: 6px 12px;
            text-decoration: none;
            display: inline-block;
        }
        .home:hover{
            color: white;
            text-decoration: none;
            opacity: 0.8;
            transition: linear 0.2s;
        }
        .container{
            margin-top:95px;
        }
    </style>
   
     <!-- header -->
  
  <!-- header -->

        <?php
        if(count($_SESSION['cart'])<=0){
       ?>
    <div class="container mt-5 mb-5" >
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <p class="p">Chưa Có Sản Phẩm Nào Trong Giỏ Hàng</p>
                <a class="home" href="index.php?act=trangchu">Quay Trở lại cửa hàng</a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
<?php };?>

  <!-- show cart -->
  <?php
        if(count($_SESSION['cart'])>0){
       ?>
  <div class="table mt-5 mb-5" >
    <form action="index.php?act=giohang&&action=sua" method="post" >
    <table class="table" >
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col"></th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Màu Sắc</th>
            <th scope="col">Size</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Thành Tiền</th>

          </tr>
        </thead>
        <?php $i=1;  foreach($_SESSION['cart'] as $key =>$e):    ?>
        <tbody>
          <tr style="line-height: 55px;" >
            <td scope="row"><?php echo $i++ ?></td>
            <td class="pd-0"><img src="./View/Anh/<?php echo $e['img']?>" style="width:100px;" class="p-0" alt=""></td>
            <td><?php echo $e['tensp'] ?></td>
            <td><?php echo $e['mausac'] ?></td>
            <td><?php echo $e['size'] ?></td>
            <td> <input type="text" name="newsl[<?php echo $key ?>]" value="<?php echo $e["soluong"];?>"></td>
            <td><?php echo number_format($e['gia']) ?></td>
            <td><?php echo number_format($e['thanhtien']) ?></td>
            <td><a href="index.php?act=giohang&&action=xoa&&id=<?php echo $key;?>" class="btn btn-danger" >Xoá</a>
            <button type="submit" class="btn btn-danger" >Sửa</button></td>

          </tr>
        </tbody>
        <?php endforeach; ?>
               <tr >
                <td> </td>
                <td></td>
                <td> </td>
                <td></td>

                <td><a class="btn btn-danger" href="index.php?act=thanhtoan&action=thanhtoan">Thanh Toán</a></td>
                <td></td>
                <td><h5>Tổng Tiền:</h5></td>

                <td><?php $gh=new giohang();echo number_format($gh->gettotal()); ?></td>

            </tr>
      </table>
    </form>
<?php }

?>
</div>
</div>