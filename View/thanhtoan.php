
  <!-- header -->
    <div class="container mt-5 mb-5" >
        <div class="row">
            <div class="col-4 mt-2"style="border: 1px solid orange;">
              <h4 class="text-center mt-5">Thông Tin Thanh Toán</h4>
              <form action="#"  name="frm"  novalidate >
                <div class="form-group">
                  <?php 
                  $db = new thanhtoan();
                 $user= $db->getuser($_SESSION['iddh']);
                   ?>
                  <label for="">Họ Tên</label>
                  <input type="text" name="ten" id="" disabled value="<?php echo $user['hoten']?>" required ng-model="ten" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <!-- <div class="form-group">
                    <label for="">Quốc Gia</label>
                    <select class="w-100" style="height: 38px;border-radius: 4px;border: 1px solid #ced4da;" name="world" id="" ng-model="world" >
                      <option value="">Việt Nam</option>
                      <option value="">Lào</option>
                      <option value="">Campuchia</option>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <label for="">Địa Chỉ</label>
                    <input type="text" name="diachi" disabled value="<?php echo $user['diachi']?>" required id="" class="form-control" placeholder="" ng-model="diachi" aria-describedby="helpId">
                  </div>
                  <!-- <div class="form-group">
                    <label for="">Tỉnh/Thành Phố</label>
                    <input type="text" name="tp" id="" required class="form-control" placeholder="" ng-model="tp" aria-describedby="helpId">
                    <span ng-show="frm.tp.$invalid" class="text-danger">Vui Lòng Nhập Địa Chỉ</span>
                  </div> -->
                  <div class="form-group">
                    <label for="">Số Điện Thoại</label>
                    <input type="text" name="phone" id="" disabled value="<?php echo $user['dienthoai']?>" required class="form-control" placeholder="" ng-model="phone" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" disabled value="<?php echo $user['email']?>" required id=""  class="form-control" placeholder="" aria-describedby="helpId">
                  </div>
                  <!-- <p>Ghi chú đơn hàng(tùy chọn)</p>
                  <textarea class="w-100" name="" id="" cols="5" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>             -->
                </form>                
            </div>
            <div class="col-8 mt-5">
                <div class="border-pay p-5 " style="border: 1px solid orange;">
                 <h4>Đơn Hàng Của Bạn</h4> 
                <table class="w-100" >
                  <tr>
                    <th class="p-3">Sản Phẩm</th>
                    <th  class="p-3">Số Lượng Mua</th>
                    <th  class="p-3">Màu Sắc</th>
                    <th  class="p-3">Size</th>
                    <th  class="p-3">Thành Tiền</th>
                  </tr>
                  <?php 
                  $db = new thanhtoan();
                  $row=$db->getdonhang($_SESSION['iddh']); 
                  $sum=0;
                  $sl=0;
                  while($result=$row->fetch()): 
                    ?>
                  <tr style="border-bottom: 1px solid #ccc;" >
                    <td  class="p-3"><?php echo $result['tensp']?></td>
                    <td  class="p-3"> <?php echo $result['soluongmua']?></td>
                    <td  class="p-3"> <?php echo $result['mausac']?></td>
                    <td  class="p-3"> <?php echo $result['size']?></td>
                    <td  class="p-3"> <?php echo number_format($result['thanhtien'])?></td>

                  </tr>
                 
                  <?php                
                  $sl+=$result['soluongmua'];
                 $sum+=$result['thanhtien'];
                  endwhile; 
                  ?>
                   <tr style="border-bottom: 1px solid #ccc;">
                    <td  class="p-3">Tổng</td>
                    <td  class="p-3"><?php echo $sl;?></td>
                    <td></td>
                    <td></td>
                    <td  class="p-3"><?php echo number_format($sum);?></td>
                  </tr>
                   <tr style="border-bottom: 1px solid #ccc;">
                    <td  class="p-3">Giao Hàng</td>
                    <td>Giao Hàng Miễn Phí</td>
                  </tr>
                  <div class="d-flex justify-content-around float-right  " style="border-bottom: 1px solid #ccc;padding:5px;width:300px;">
                    <span style="width:140px;" ><b>MDH:<?php echo $_SESSION['iddh'] ?></B></span>                 
                    <span style="width:200px;"><b>Ngày Đặt: <?php  $date = new Datetime('now');
                                echo $date->format('Y-m-d'); ?></b></span>
                  </div>
                 
                </table>
                <!-- <input class="mt-3" name="pay" type="radio"> Trả tiền mặt khi nhận hàng<br>
                <input class="mt-3" name="pay" type="radio"> Chuyển khoản ngân hàng<br>
                <button class="btn btn-danger text-white d-block w-100 mt-5" type="button" >Đặt Hàng</button>                 -->
                </div>
            </div>
        </div>
    </div>
      
  