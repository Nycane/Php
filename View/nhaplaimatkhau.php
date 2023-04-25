<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <form action="index.php?act=login&&action=laymatkhau" method="post" name="frm">
                <div class="card">
                    <div class="card-body"style="background-image:linear-gradient(purple, pink) ;">
                        <div class="form-group">
                          <label for="" class="text-white-50">Nhập Mã Code</label>
                          <input type="text" name="code" required  class="form-control" placeholder="Nhập Mã Code" aria-describedby="helpId">                              
                        </div>
                        <div class="form-group">
                          <label for="" class="text-white-50">Nhập Mật Khẩu Mới</label>
                          <input type="password" name="mkmoi" required class="form-control" placeholder="Nhập Mật Khẩu Mới" aria-describedby="helpId">                              
                        </div>
                          <div class="dangnhap text-center">
                          <input type="submit" name="quenmk" value="Submit" class="btn btn-warning"></input>
                          </div>               
                    </div>  
                </div>
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>