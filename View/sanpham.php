<!-- -----------------------------------San pham giam gia------------------------------------------------ -->
<?php
$db = new sanpham();
if($_GET['nhom']=="spgg"){
$count = $db->getpkggAll()->rowCount();
}else{
 $count = $db->getpkkAll()->rowCount();
}
$limit=6;
$pg = new page();
$page = $pg->getTotalPage($count,$limit);
$currentPage=isset($_GET['page'])?$_GET['page']:1;
$start=$pg->getStart($currentPage,$limit);
echo $start;
echo $currentPage;
?>
<?php 
        if($_GET['nhom']=="spgg"){

?>
<div class="vungsanpham" ng-Controller="spgiamgia">
    <!-- Order -->
    <div class="d-flex justify-content-center">
        <div class="dropdown">
        <button class="btn btn-white shadow-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Sắp Xếp Sản Phẩm Theo Giá
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="index.php?action=sanpham&act=sanpham&nhom=spgg&order=asc">Sắp xếp sản phẩm tăng dần</a>
            <a class="dropdown-item" href="index.php?action=sanpham&act=sanpham&nhom=spgg&order=desc">Sắp xếp sản phẩm giảm dần</a>
        </div>
    </div>
        </div>
    <!--  -->
        <div class="container mt-5 mb-5">
            <h3 class="text-center">SẢN PHẨM GIẢM GIÁ</h3>
            <hr width="100%" style="border-top: 2px solid black;">
            <div class="row">

            <?php
                   $db = new sanpham();
                   if(isset($_GET['order'])){
                    $_SESSION['order']=$_GET['order']; 
                    }
                    if(isset($_SESSION['order'])){
                        $kq=$db-> getListSpggorder($start,$limit,$_SESSION['order']);

                    }else{
                         $kq=$db->getListSpggOnPage($start,$limit);
                    }
                   $result=$kq->fetchAll();
                   foreach($result as $row):
            ?>
                <div class="col-lg-4 mb-0">
                    <div class="card text-center">
                      <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'] ;?>"><img class="card-img-top khuyenmai" src="./View/Anh/<?php echo $row['img']?>" alt=""></a>  
                        <span class=" title-khuyenmai">-30%</span>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['tensp'] ?></h4>
                            <p class="card-text mb-4"><strike class="text-danger"><?php echo number_format($row['gia']) ?> VND</strike> <?php echo number_format($row['giamgia']) ?> VND </p>
                            <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Thêm Vào Giỏ</a>
                        </div>
                        <div class="thirty"></div>
                    </div>
                </div>
                        <?php 
                        endforeach 
                        ?>
            </div>
            <nav aria-label="Page navigation example">
  <ul class="pagination d-flex justify-content-center mt-3 mb-5">
  <?php 
     if($currentPage>1):
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=spgg&page=<?php echo $currentPage-1?>">Previous</a></li>
    <?php  endif;?>
    <!-- for -->
    <?php 
        for($i=1;$i<=$page;$i++):
     ?>
        <?php 
        if($i!=$currentPage){
        ?>
         <?php
        if($i>$currentPage-5&&$i<$currentPage+5){ 
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=spgg&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php };?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=spgg&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=spgg&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif;?>
  </ul>
</nav>
            
        </div>
    </div>
    <?php 
        };
    ?>
   
<!-- -----------------------------------San pham giam gia------------------------------------------------ -->

<!-- -----------------------------------Phu kien khac------------------------------------------------ -->

    <?php 
            if($_GET['nhom']=="pkk"){
    ?>
     <div class="vungsanpham" ng-controller="phukienkhac">
        <!-- Order -->
        <div class="d-flex justify-content-center">
        <div class="dropdown">
        <button class="btn btn-white shadow-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Sắp Xếp Sản Phẩm Theo Giá
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="index.php?action=sanpham&act=sanpham&nhom=pkk&order=asc">Sắp xếp sản phẩm tăng dần</a>
            <a class="dropdown-item" href="index.php?action=sanpham&act=sanpham&nhom=pkk&order=desc">Sắp xếp sản phẩm giảm dần</a>
        </div>
    </div>
        </div>
        <!--  -->
        <div class="container mt-5 mb-5">
            <h3 class="text-center">PHỤ KIỆN KHÁC</h3>
            <hr width="100%" style="border-top:2px solid black ;">
            <div class="row mt-5">
            
            <?php 
            if(isset($_GET['order'])){
                $_SESSION['order']=$_GET['order']; 
            }
          
                    $db = new sanpham();
                    if(isset($_SESSION['order'])){
                        $kq=$db-> getListPkkOrder($_GET['nhom'],$start,$limit,$_SESSION['order']);
                    }else{
                        $kq=$db->getListPkkOnPage($_GET['nhom'],$start,$limit);
                    }
                    
                    $result=$kq->fetchAll();
                    foreach($result as $row):
            ?>
                <div class="col-4 mt-5">
                    <div class="card">
                      <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'] ;?>"><img class="card-img-top" src="./View/Anh/<?php echo $row['img'] ?>" alt=""></a> 
                        <div class="card-body text-center">
                            <h5 class="card-title "><?php echo $row['tensp'] ?></h5>
                            <p class="card-text text-danger mb-4"><?php echo number_format($row['gia']) ?> VND</p>
                            <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id'];?>">Thêm Vào Giỏ</a>

                        </div>
                    </div>
                </div>
                
               <?php  endforeach ?>  
                           
            </div>
            <nav aria-label="Page navigation example">
  <ul class="pagination d-flex justify-content-center mt-3 mb-5">
  <?php 
     if($currentPage>1):
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=pkk&page=<?php echo $currentPage-1?>">Previous</a></li>
    <?php  endif;?>
    <?php 
        for($i=1;$i<=$page;$i++):
     ?>
     <?php
        if($currentPage!=$i){
     ?>
     <?php
        if($i>$currentPage-5&&$i<$currentPage+5){ 
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=pkk&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php 
        }
     ?>
   <?php }else{
   ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=pkk&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
   <?php 
   };
   ?>
    <?php endfor?>
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=sanpham&nhom=pkk&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif;?>
  </ul>
</nav>
        </div>
    </div>

    <?php 
            };
     ?>
   
     
<!-- -----------------------------------Phu kien khac------------------------------------------------ -->
