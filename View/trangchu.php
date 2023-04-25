
  

      <!-- slide -->
      <h1</h1>
    <div class="slide">
        <div class="container mt-5">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="./View/Anh/slide-1.jpg" width="100%">
                        <div class="text-slide1">
                            <h1 class="">M O N A S N K E R</h1>
                            <p>Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng<br>
                                chữ,
                                mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu<br>
                                ấn lịch sử Converse 100 năm,
                                và đang không ngừng phát triển lớn mạnh. </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./View/Anh/slide-2.jpg" width="100%" alt="Second slide">
                        <div class="text-slide2">
                            <h1 class="">M O N A S N K E R</h1>
                            <p>Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng<br>
                                chữ,
                                mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu<br>
                                ấn lịch sử Converse 100 năm,
                                và đang không ngừng phát triển lớn mạnh. </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./View/Anh/slide-5.jpg" width="100%" alt="Third slide">
                        <div class="text-slide3">
                            <h1 class="text-center">M O N A S N K E R</h1>
                            <p>Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng<br>
                                chữ,
                                mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu<br>
                                ấn lịch sử Converse 100 năm,
                                và đang không ngừng phát triển lớn mạnh. </p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" data-target="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only ">Previous</span>
                </a>
                <a class="carousel-control-next" data-target="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- slide -->

    <!-- Content 1 -->
    <div class="content-1">
        <div class="container mt-5 block1">
            <div class="row">
                <div class="col-4">
                    <div class="sanpham">
                        <img class="title-img" src="./View/Anh/title_block_03.png" alt="">
                        <img class="img" src="./View/Anh/product_block_03.png" alt="">
                        <a href="?act=ctsp" class="text-img">Xem Sản Phẩm</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="sanpham">
                        <img class="title-img" src="./View/Anh/title_block_05.png" alt="">
                        <img class="img" src="./View/Anh/product_block_05.png" alt="">
                        <a href="#!Shop" class="text-img">Xem Sản Phẩm</a>
                    </div>
    
                </div>
                <div class="col-4">
                    <div class="sanpham">
                        <img class="title-img" src="./View/Anh/title_block_07.png" alt="">
                        <img class="img" src="./View/Anh/product_block_07.png" alt="">
                        <a href="#!Shop" class="text-img">Xem Sản Phẩm</a>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <!-- Content 1 -->

    <!-- tabs -->
    <div class="container mt-5" ng-controller="vungsp">
        <div class="row">
            <div class="col-12" style="height: 400px;">
                <ul class="nav nav-tabs p-3">
                    <li class=" "><a class=" nav-link tabs active"  style="text-transform: uppercase;" data-toggle="tab" 
                           data-target="#menu">Sản phẩm mới</a></li>
                    <li class=" "><a class=" nav-link tabs" data-toggle="tab" style="text-transform: uppercase;"
                        data-target="#menu1">Sản phẩm bán chạy</a></li>
                    <li class=" "><a class=" nav-link tabs" data-toggle="tab" style="text-transform: uppercase;"
                        data-target="#menu2">Sản phẩm phổ biến</a></li>
                </ul>
                <div class="tab-content ">
                    <div id="menu" class="tab-pane fade in active show active">
                        <!-- Vungsanpham1 Sanphammoi -->
                        <div class="vungsanpham mt-5">
                            <div class="container">
                                <div class="row">
                                    <?php 
                                            $db = new sanpham();
                                            $array=$db->getspm()->fetchAll();
                                          foreach($array as $row){                           
                                    ?>
                                    <div class="col-3">
                                        <div class="card">
                                            <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'] ;?>"><img class="card-img-top"
                                                    src="./View/Anh/<?php echo $row['img']?>" alt=""></a>
                                            <div class="card-body text-center">
                                                <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']; ?>"
                                                    class="card-title text-center"><?php echo $row['tensp'] ;?></a>
                                             <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>"><p class="card-text text-center text-danger mb-4"><?php echo number_format($row['gia']) ?></p></a>   
                                                <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Xem Sản Phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                          };
                                    ?>           
                                </div>
                            </div>
                        </div>
                        <!-- Vungsanpham1 -->
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <!-- Vungsanpham2 Sanphambanchay-->
                        <div class="vungsanpham mt-5">
                            <div class="container">
                                <div class="row">
                                    <?php 
                                    $db = new sanpham();
                                    foreach($db->getspbc()->fetchAll() as $row){
                                    ?>
                                    <div class="col-3">
                                        <div class="card">
                                        <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'] ;?>"><img class="card-img-top" src="./View/Anh/<?php echo $row['img']?>" style="max-height:200px" alt=""></a>    
                                            <div class="card-body text-center">
                                               <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>"><h5 class="card-title "><?php echo $row['tensp']?></h5></a> 
                                               <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>"><p class="card-text text-danger mb-4"><?php echo number_format($row['gia'])?></p></a> 
                                                <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Xem Sản Phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                  
                                        <?php 
                                            }
                                        ?>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Vungsanpham2 -->
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <!-- Vungsanpham3 Sanphamphobien-->
                        <div class="vungsanpham mt-5">
                            <div class="container">
                                <div class="row">
                                    <?php 
                                            $db = new sanpham();
                                            $result=$db->getsppb();
                                            while($row = $result->fetch()):
                                    ?>
                                    <div class="col-3">
                                        <div class="card">
                                      <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>">  <img class="card-img-top" src="./View/Anh/<?php echo $row['img'] ?>" alt=""></a>    
                                            <div class="card-body text-center">
                                                <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>"><h5 class="card-title"><?php echo $row['tensp'] ?></h5></a>
                                               <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>"><p class="card-text text-danger mb-4"><?php echo number_format($row['gia']) ?></p></a> 
                                                <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Xem Sản Phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <?php  endwhile ?>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Vungsanpham3-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tabs -->

    <!-- Phu Kien Khac -->
    <div class="vungsanpham" ng-controller="phukienkhac">
        <div class="container mt-5">
            <h3 class="text-center">PHỤ KIỆN KHÁC</h3>
            <hr width="100%" style="border-top:2px solid black ;">
            <div class="row mt-5">

            <?php 
                    $db = new sanpham();
                    foreach($db->getpkk()->fetchAll() as $row):
            ?>
                <div class="col-3 mt-5">
                    <div class="card">
                      <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>"><img class="card-img-top" src="./View/Anh/<?php echo $row['img'] ?>" alt=""></a>  
                        <div class="card-body text-center">
                          <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>"><h5 class="card-title "><?php echo $row['tensp'] ?></h5></a>  
                           <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>"><p class="card-text text-danger mb-4"><?php echo number_format($row['gia']) ?> VND</p></a> 
                            <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Xem Sản Phẩm</a>

                        </div>
                    </div>
                </div>
               <?php  endforeach ?>              
            </div>
            <div class="text-center  mt-2 mb-5">
                                <a href="index.php?act=sanpham&&action=sanpham&&nhom=pkk" class="btn btn-dark" style="min-width:350px">Xem Thêm</a>
                                </div>
        </div>
    </div>
    <!-- Phu Kien Khac -->

    <!-- img khuyenmai-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="img-khuyenmai" src="./View/Anh/thiet-ke-shop-quan-ao-nu.jpg" width="100%" alt="">
                <div class="img-khuyenmai-title">
                    <h5>MONA SNE<i class="fa fa-star"></i>KER</h5>
                    <h1 style="font-size:50px">KHUYẾN MÃI <span class="text-warning">GIẢM GIÁ 50%</span></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- ANh -->

    <!-- san pham giam gia-->

   
    <div class="vungsanpham" ng-Controller="spgiamgia">
        <div class="container mt-5">
            <h3 class="text-center">SẢN PHẨM GIẢM GIÁ</h3>
            <hr width="100%" style="border-top: 2px solid black;">
            <div class="row">

            <?php
                    $db = new sanpham();
                    foreach($db->getpkgg()->fetchAll() as $row): 
            ?>
                <div class="col-lg-3 mb-0">
                    <div class="card text-center">
                     <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']?>"><img class="card-img-top khuyenmai" src="./View/Anh/<?php echo $row['img']?>" alt=""></a>   
                        <span class=" title-khuyenmai">-30%</span>
                        <div class="card-body">
                         <a href="index.php?act=sanpham&&act=chitiet&&id=<?php echo $row['id']?>"><h4 class="card-title"><?php echo $row['tensp'] ?></h4></a>   
                           <p class="card-text mb-4"><strike class="text-danger"><?php echo number_format($row['gia']) ?> VND</strike> <a href="index.php?act=chitiet" style="color:black"><?php echo number_format($row['giamgia']) ?> VND</a> </p>
                            <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Xem Sản Phẩm</a>
                        </div>
                        <div class="thirty"></div>
                    </div>
                </div>
                        <?php 
                        endforeach 
                        ?>
               
               
            </div>
            
            <div class="text-center mt-2 mb-5">
                                <a href="index.php?act=sanpham&&action=sanpham&&nhom=spgg" class="btn btn-dark" style="min-width:350px">Xem Thêm</a>

                                </div>
        </div>
    </div>
    

   
    <!-- san pham giam gia-->

   
