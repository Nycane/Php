<div class="header"  >
    <div class="container-fluid">
        <div class="row">
            <div class="menu d-flex justify-content-center align-items-center">
                <img class=""src="./View/Anh/logo-mona.png" alt="">
                 <!--  -->
            </div>
            <form action="index.php?action=search&act=sanpham" method="post">
            <div class=" d-flex" style="position:absolute;right:140px;top:22px">
            <input  type="search" style="display:none;" name="search" class="form-control ip-search" autocomplete="off"  placeholder="Search"/>
                <button  type="submit"  class="btn btn-btn-danger btn-search">
                    <i class="fa fa-search text-white"></i>
                </button>

            </div>
            </form>
            <!--  -->
            </div>
            <div class="giohang">
                <!-- <a href=".bd-example-modal-lg" data-toggle="modal">Giỏ Hàng <i class="fa fa-shopping-cart"></i> </a> -->
                <a href="index.php?act=giohang" ><span class="text-danger"></span>Giỏ Hàng <i class="fa fa-shopping-cart"><?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])>=1) {
                                        //   echo '<meta http-equiv="refresh" content="0; url=./index.php?act=giohang"/>';

    echo count($_SESSION['cart']);
}?></i> </a>
            </div>
        </div>
    </div>
    <nav class=" navbar navbar-expand-sm navbar-light bg-light ">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active ml-2 mr-2 ">
                    <a class="nav-link" href="index.php?act=trangchu">Home</a>
                </li>
                <li class="nav-item active ml-2 mr-2 ">
                    <a class="nav-link" href="index.php?act=shop">Shop</a>
                </li>
                <li class="nav-item active ml-2 mr-2 ">
                    <a class="nav-link" href="index.php?act=lienhe">Liên Hệ</a>
                </li>
                <li class="nav-item active ml-2 mr-2 ">
                    <a class="nav-link" href="index.php?act=gioithieu">Giới Thiệu</a>
                </li>
                <?php
                $db = new category();
                $kq= $db->getCategory();
                while($row=$kq->fetch()):
                ?>
                <li class="nav-item active ml-2 mr-2 ">
                    <a class="nav-link" href="index.php?act=danhmuc&action=<?php echo $row['id']?>"><?php echo $row['tendanhmuc'] ?></a>
                </li>
                <?php 
                endwhile;
                ?>
            </ul>

            <ul class="navbar-nav  mt-2  mt-lg-0" style="">
                <li class="nav-item dropdown">
                    <?php
if (!isset($_SESSION['id'])) {
    ?>
                    <a class="nav-link" style="color: black;" href="#" id="dropdownId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Login</a>
                            <?php }
;?>
                    <div class="dropdown-menu" style="left:-83px" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="index.php?act=login&&action=dangnhap_user">User</a>
                        <a class="dropdown-item" href="index.php?act=login_admin&&action=dangnhap_admin">Admin</a>
                    </div>
                </li>
                            <?php if (isset($_SESSION['id'])) {?>
                <li class="nav-item " style="position:none!important;">
                <a class="nav-link" style="color: black;" href="" id="dropdownId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['ten'] ?> <img src="https://gocbao.net/wp-content/uploads/2020/10/avatar-trang-4.jpg" style="width:50px;height:50px;border-radius:50%" alt=""></a>
                    <div class="dropdown-menu" style="position:absolute;left:88%;top:100%;" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="index.php?act=login&&action=tdmk">Thay Đổi Mật Khẩu</a>
                        <a class="dropdown-item" href="index.php?act=login&&action=dangxuat">Đăng xuất</a>
                        <a class="dropdown-item" href="index.php?act=sanpham&&action=yeuthich">Danh Sách yêu Thích</a>
                    </div>
                </li>
                                <?php }
;?>
            </ul>
        </div>
    </nav>
</div>