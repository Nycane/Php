

<?php 
//  if($_SERVER["REQUEST_METHOD"]=="POST")
//  {
//     if($_POST['hoten']==""){
//      $_SESSION['nameErr']="Vui Lòng Không Để Trống";
//     }else{
//      if(!preg_match("/[^0-9\.@#$%^&*()_+]$/",$_POST['hoten'])){
//          $_SESSION['nameErr']="Vui Lòng Nhập Đúng Định Dạng Tên";
//      }
//      else{
//              unset( $_SESSION['nameErr']);
//      }
//     }
//     if($_POST['email']==""){
//      $_SESSION['emailErr']="Vui Lòng Không Để Trống";
//     }else{
//      if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
//          $_SESSION['emailErr']="Vui Lòng Nhập Đúng Định Dạng Email";
//      }
//      else{
//         unset($_SESSION['emailErr']);
//      }
//     }
//     if($_POST['phone']==""){
//      $_SESSION['phoneErr']="Vui Lòng Không Để Trống";
//     }else{
//      if(!preg_match("/^(0|\+84){1}[0-9]{9,10}$/",$_POST['phone'])){
//          $_SESSION['phoneErr']="Vui Lòng Nhập Đúng Định Dạng Phone";
//      }
//      else{
//         unset( $_SESSION['phoneErr']);
//      }  
//     }
//     if($_POST['password']==""){
//      $_SESSION['passwordErr']="Vui Lòng Không Để Trống";
//  }else{
//      if(!preg_match("/^[A-Z][\w\.@#$%&^*()]+$/",$_POST['password'])){
//          $_SESSION['passwordErr']="Vui Lòng Nhập Đúng Định Dạng PassWord ";
//      }
//      else{
//          unset($_SESSION['passwordErr']);
//      }
//  }
//  if($_POST['nlpassword']==""){
//    $_SESSION['nlpasswordErr']="Vui Lòng Không Để Trống";
//  }else{
//    if($_POST['password']!=$_POST['nlpassword']){
//      $_SESSION['nlpasswordErr']="Mật khẩu nhập lại không đúng";
//    }
//    else{
//      unset($_SESSION['nlpasswordErr']);
//    }
//  }
//  if($_POST['diachi']==""){
//    $_SESSION['adressErr']="Vui Lòng Không Để Trống";
//  }else{
//    if(!preg_match("/[^0-9\.@#$%^&*()_+]$/",$_POST['diachi'])){
//        $_SESSION['adressErr']="Vui Lòng Nhập Đúng Định Dạng ";
//    }
//    else{
//      unset( $_SESSION['adressErr']);
//    }
//  }
// }
// ?>
<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
            <!-- "" -->
            <!--  index.php?act=dangky&&action=dangky_act"-->

                  <form action="index.php?act=dangky&&action=dangky_act"method="post" >
                 
                    <div class="card">
                        <div class="card-header"style="background-image: linear-gradient(to right, purple, pink);" >
                            <h3 class="text-center text-white" >Đăng Ký </h3>
                        </div>
                        <div class="card-body"style="background-image:linear-gradient(purple, pink);">
                            <div class="form-group">
                              <label for="" class="text-white-50">Nhập User Name</label>
                              <input type="text" name="hoten" required   class="form-control" placeholder="Nhập Họ Tên..." aria-describedby="helpId" >
                              <span class="error  text-dark"><?php if(isset($_SESSION['nameErr'])){echo $_SESSION['nameErr'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white-50">Nhập Email</label>
                                <input type="email" name="email" required  class="form-control"  placeholder="Nhập Email..." aria-describedby="helpId">
                                <span class="error  text-dark"><?php if(isset($_SESSION['emailErr'])){echo $_SESSION['emailErr'];}?></span>   
                              </div>
                              <div class="form-group">
                                <label for="" class="text-white-50">Nhập Password</label>
                                <input type="password" name="password" required   class="form-control"  placeholder="Nhập Password..." aria-describedby="helpId">
                                <span class="error  text-dark"> <?php if(isset($_SESSION['passwordErr'])){echo $_SESSION['passwordErr'];}?></span>
                              </div>
                              <div class="form-group">
                                <label for="" class="text-white-50">Nhập Lại Password</label>
                                <input type="password" required name="nlpassword" required  class="form-control"  placeholder="Nhập Lại Password..." aria-describedby="helpId">
                                <span class="error  text-dark"><?php if(isset($_SESSION['nlpasswordErr'])){echo $_SESSION['nlpasswordErr'];}?></span>
                              </div> 
                              <div class="form-group">
                                <label for="" class="text-white-50">Nhập Số Điện Thoại</label>
                                <input type="text" name="phone" required   class="form-control" placeholder="Nhập Số Điện Thoại..." aria-describedby="helpId">
                                <span class="error  text-dark"> <?php if(isset($_SESSION['phoneErr'])){echo $_SESSION['phoneErr'];}?></span>
                              </div>
                              <div class="form-group">
                                <label for="" class="text-white-50">Nhập Địa Chỉ</label>
                                <input type="text" name="diachi" required   class="form-control"  placeholder="Nhập Địa Chỉ..." aria-describedby="helpId">
                                <span class="error text-dark"><?php if(isset($_SESSION['adressErr'])){echo $_SESSION['adressErr'];}?></span>
                              </div>  
                              <button type="submit"  class="btn btn-warning">Đăng Ký</button>        
                        </div>     
                    </div>     
                </form>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>