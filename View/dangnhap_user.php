<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <form action="index.php?act=login&&action=dangnhap_act"name="frm" method="post" ng-controller="myctrl" >
                    <div class="card">
                        <div class="card-header"style="background-image: linear-gradient(to right, purple, pink);" >
                            <h3 class="text-center text-white" >Đăng Nhập User</h3>
                        </div>
                        <div class="card-body"style="background-image:linear-gradient(purple, pink) ;">
                            <div class="form-group">
                              <label for="" class="text-white-50">Nhập Email</label>
                              <input type="email" name="email" id="hoten" required  class="form-control" placeholder="Nhập Email" aria-describedby="helpId">                              
                              <span id="kq_hoten" class="text-danger "> </span>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white-50">Nhập Mật Khẩu</label>
                                <input type="password" name="pass" required   class="form-control" placeholder="Nhập Password" aria-describedby="helpId">   
                                <span id="kq_email" class="text-danger"></span>                           
                              </div>                  
                              <button type="submit" class="btn btn-warning">Đăng Nhập</button>
                              <a href="index.php?action=quenmatkhau&act=login" style="margin-left:70px;position:relative;top:30px">Quên Mật Khẩu?</a>
                              <button  type="button" class="btn btn-danger float-right"> 
                                <a href="index.php?act=dangky&&action=dangky_user" style="color:black;text-decoration: none;">Đăng Ký</a>
                            </button>
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>