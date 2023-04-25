<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6 mt-5">
                <form action="index.php?act=login_admin&&action=tdmk" name="frm" method="post" novalidate >
                    <div class="card">
                        <div class="card-header"style="background-image: linear-gradient(to right, purple, pink);" >
                            <h3 class="text-center text-white" >Đổi Mật Khẩu</h3>
                        </div>
                        <div class="card-body"style="background-image:linear-gradient(purple, pink) ;">
                            <div class="form-group">
                              <label for="" class="text-white-50">Nhập Mật Khẩu Cũ</label>
                              <input type="password" name="mkcu" id="hoten" required  class="form-control" placeholder="Nhập Mật Khẩu Cũ" aria-describedby="helpId">                              
                              <span id="kq_hoten" class="text-danger "><?php if(isset($_SESSION['mkcuErr'])){echo $_SESSION['mkcuErr'];} ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white-50">Nhập Mật Khẩu Mới</label>
                                <input type="password" name="mkmoi" required   class="form-control" placeholder="Nhập Password" aria-describedby="helpId">   
                                <span id="kq_email" class="text-danger"><?php if(isset($_SESSION['mkmoiErr'])){echo $_SESSION['mkmoiErr'];} ?> </span>                           
                              </div>       
                              <div class="form-group">
                                <label for="" class="text-white-50">Nhập Lại Mật Khẩu</label>
                                <input type="password" name="nlmkmoi" required   class="form-control" placeholder="Nhập Lại Password" aria-describedby="helpId">   
                                <span id="kq_email" class="text-danger"><?php if(isset($_SESSION['nlmkmoiErr'])){echo $_SESSION['nlmkmoiErr'];} ?> </span>                           
                              </div>           
                              <button  type="submit" class="btn btn-danger "> 
                                Thay Đối
                            </button>
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>
    
</body>
</html>