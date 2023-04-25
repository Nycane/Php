<link rel="stylesheet" href="../Css.css">
<script>
    function laysize(v){
        document.getElementById('size').value=v;
    }
    
</script>
    <!-- header -->
   
    <!-- header -->

    <!-- CHitietsanpham -->
   
<?php 
 
        $bl= new binhluan();
        $db = new sanpham();
        if(isset($_GET['id'])){
            $_SESSION['idsp']=$_GET['id'];
        }
        echo $_SESSION['idsp'];
        $row=$db->getctsp($_SESSION['idsp']);
        $result=$bl->getPeopleCmt($row['id'])->fetch();
       
 ?>
 <form action="index.php?act=giohang&&action=them" method="post">
    <div class="container mb-5 mt-5 ">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <img src="./View/Anh/<?php echo $row['img'];?>"  width="100%"
                    alt="">
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="product-content">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                    <h3 class="product-title"><?php echo $row['tensp'] ?></h3>
                    <?php  if($result['count(id_sanpham)']>0){?>
                    <?php 
                                        $kq= $bl->getrate($row['id']);
                                       $rate= $kq->fetch();
                                       $lengtRate=ceil($rate['sum(rate)']/$result['count(id_sanpham)']);
                                        for($rate=1;$rate<=$lengtRate;$rate++){
                                            ?>
                    <i class="fa fa-star text-warning"></i>
                                        <?php
                                        };
                                        ?>
                                     (<?php   echo $result['count(id_sanpham)'];?> Đánh Giá)
                                     <?php }else{?>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <?php };?>
                    <p>Chất vải Canvas mềm nhẹ, thoáng khí, ít thấm nước
                        Thiết kế cổ thấp gọn gàng, đơn giản, dễ mang
                        Màu sắc trắng - đen cơ bản dễ phối đồ, đa dạng phong cách
                        Khoen tròn được làm bằng kim loại cao cấp, chống rỉ sét
                        Đế cao su bền chắc, có độ bám tốt</p>
                </div>
                <div class="mau">
                        <select name="mausac" id="" style="width:200px">
                            <?php 
                                $result= $db->getmau($row['id_loai']);
                               
                                 while($kq=$result->fetch()):
                            ?>
                            
                            <option value="<?php echo $kq['mausac'];?>"><?php echo $kq['mausac'];?></option>
                            
                            <?php endwhile; ?>
                        </select>
                </div>
                <div class="size mt-3 mb-3">
                    <input type="hidden" name="size" id="size" value="">
                                      <?php 
                                            $size=$db->getsize($row['id_loai']);
                                            while($s=$size->fetch()):
                                      ?>    
                                            <button class="btn btn-dark" type="button" onclick="laysize(<?php echo $s['size']?>)" style="border-radius:50%"><?php echo $s['size'] ?></button>

                                      <?php endwhile;?>
                </div>
                <div class="soluong d-flex">
               <h5 class=""> Số Lượng:</h5>

<input class="ml-2" type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                </div>
                <h5 class="mt-3">Price: <?php
                if($row['giamgia']){
                    echo number_format($row['giamgia']);
                }else{
                    echo number_format($row['gia']); 
                }
                 ?> VND</h5>
                <div class="product-price">
                    <p class="new-price text-danger" style="font-size: 25px;font-weight: 600;"></p>
                </div>
                <div class="form-cart d-flex">
                    <?php 
                       $kq= $db->ktsoluongton($row['id']);
                      if($kq['slton']==0){
                    ?>
 <button type="submit" class="btn btn-danger mr-2">Hết Hàng</button>
                        <?php 
                        }else{
                        ?>
                        <?php if(isset($_SESSION['id'])){?>
                    <a href="index.php?act=dsyeuthich&&action=yeuthich&id=<?php echo $row['id'] ?>" class="btn btn-primary mr-2 ">
                        Yêu Thích<i class="fa fa-heart ml-1"></i>
                    </a>
                    <?php };?>
                    <button type="submit" class="btn btn-danger mr-2">Thêm vào giỏ
                        hàng<i class="fa fa-shopping-cart ml-1"></i></button>

                        <?php };?>
                </div>
                <!-- collaspe -->
                <div id="accordion" class="mt-5 ">
                    <div class="card">
                        <div class="card-header bg-white" id="headingOne">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link text-dark btn1" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Tính Năng Sản Phẩm <?php echo $row['tensp']?>
                                </button>
                                <i class="fa fa-chevron-down"></i>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse"  aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                Chất liệu vải Canvas cao cấp, bền nhẹ, giúp đôi giày giữ được form dáng chuẩn
                                Thiết kế cổ cao với lưỡi gà và gót sau cao hơn các thiết kế cũ, đạt được sự thoải mái
                                mỗi khi bạn chuyển động
                                Đế giày cao hơn, màu trắng ngà và được phủ bóng. Đặc biệt, phần đế giữa được thiết kế
                                tách rời, tạo nên sự độc đáo đầy bắt mắt
                                Phần logo và lỗ thoát khí tại phần thân được chắp vá được phóng đại hơn các chi tiết
                                khác
                                Đường foxing đen đặc trưng cũng trở nên dày dặn hơn
                                Logo sau gót giày vẫn giữ nguyên như các thiết kế của dòng 1970s trước đây
                                Đệm chân OrthoLite và đế PU giúp những bước đi thêm phần thoải mái và tự tin hơn
                                Đường kim mũi chỉ tỉ mỉ và chi tiết hơn
                                Khoen xỏ lỗ giày và khoen bên hông giày được làm từ kim loại cao cấp chống rỉ sét
                                Dây giày được thiết kế lại với màu ngà trùng với đế giày có độ thanh mảnh
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header  bg-white" id="headingTwo">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link collapsed text-dark btn2" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Đa dạng phong cách với <?php echo $row['tensp']?>

                                </button>
                                <i class="fa fa-chevron-down"></i>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <p>Có thể thấy, cả hai dòng  đều được các bạn trẻ ưa chuộng bởi sự
                                    đơn giản, thời trang, đặc biệt không kén người mang.

                                    Nếu phiên bản Chuck Classic cổ cao vẫn giữ được nét độc đáo đặc trưng của thương
                                    hiệu, mang đến cho người mang một phong cách mới. Thì phiên bản cổ thấp lại đảm bảo
                                    sự đơn giản, phổ biến hơn vì chúng dễ đi, dễ kết hợp quần áo.

                                    Không ít các tín đồ thời trang hiện nay đã nhanh chóng sở hữu cho mình item “huyền
                                    thoại” này với sự đột phá về phong cách thời trang.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-white" id="headingThree">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link collapsed text-dark btn3" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                   “<?php echo $row['tensp']?> vừa tay tầm túi”
                                </button>
                                <i class="fa fa-chevron-down"></i>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                Có thể nói, so với mặt bằng chung, mức giá cho một đôi chính hãng
                                vẫn là chi phí hợp lý cho những ai yêu thích thời trang. Đặc biệt là mong muốn cho được
                                một đôi giày đúng với xu hướng và có được độ bền bỉ nhất định. Hiện tại mức giá của
                               dao động từ 1.200.000 đồng đến 1.600.000 đồng tùy vào phiên bản
                                và chất liệu bạn chọn.Một nguyên lý khi sử dụng giày Converse được mọi người truyền tai
                                nhau: “Giày Converse khi bẩn còn đẹp hơn khi sạch và càng được sử dụng nhiều càng lên
                                mã. Đó là chưa kể nó bền đến mức tưởng như không bao giờ bị hỏng”.
                                màu trắng nếu bám bẩn vẫn không vấn đề gì!

                                Với xu hướng giày Converse cực chất như hiện nay, đặc biệt là dễ sử dụng và phù hợp với
                                mọi nơi, mọi phong cách. Bạn còn chần chừ gì mà không liên hệ với Drake để được tư vấn
                                và chọn size ngay hôm nay?
                            </div>
                        </div>
                    </div>
                </div>
                <!-- collaspe -->

            </div>
        </div>
    </div>
    </form>
    <!-- dangiasanpham -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 fl-left">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Đánh Giá Sản Phẩm</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Mô Tả</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <!--  -->
                                     <?php
                                    $count = $bl->getCmtPagation($row['id'])->rowCount();
                                    $limit=4;
                                    $pg = new page();
                                    $page = $pg->getTotalPage($count,$limit);
                                    $currentPage=isset($_GET['page'])?$_GET['page']:1;
                                    $start=$pg->getStart($currentPage,$limit);
                                    echo $start;
                                    echo $currentPage;
                                    ?>
                                    <h5 class="mt-4">Đánh giá của khách hàng 
                                      
                                    </h5>
                                    <?php 
                                       
                                            $result=$bl->getCmt($row['id'],$start,$limit);
                                        while($dgsp=$result->fetch()):
                                            if(!empty($dgsp)){
                                    ?>
                                    <div class="user-review">
                                        <div class="row mt-3">

                                            <div class="col-2">
                                                <img src="https://gocbao.net/wp-content/uploads/2020/10/avatar-trang-4.jpg" alt="">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-primary m-0 mb-1" style="font-weight:500;"><?php echo $dgsp['hoten'] ?></p>
                                                <p class="m-0 mb-1"><?php 
                                                if(!empty($dgsp['rate'])){
                                                    for($i=0;$i<$dgsp['rate'];$i++){
                                                        echo "<i class='fa fa-star text-warning mr-1'></i>";
                                                    }
                                                }
                                                ?></p>
                                                <p class="m-0 mb-1"><?php echo $dgsp['binhluan']?></p>
                                               <?php
                                               if(isset($_SESSION['id'])):
                                               $like=$bl->getlike($dgsp['id'],$row['id'],$dgsp['user_id'])->fetch();
                                               ?>
                                                <p class="p-0 m-0"> <a class="review like mr-4 text-primary" href="index.php?act=binhluan&idcmt=<?php echo $dgsp['id']?>" style="cursor:pointer">Thích</a> 
                                                <a class="review"href="#">Phản Hồi</a></p>
                                                        <span class="text-dark p-0"style="font-size:13px;font-weight:600;"><?php echo $dgsp['ngaycmt']?> </span>
                                           <span class="text-info"><?php
                                           if($like['likes']>0){
                                            echo $like['likes']."Like";}endif; ?> 
                                            </span> 
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                            }
                                    endwhile;
                                    ?>
                                    <!-- <div class="user-review">
                                        <div class="row mt-3">

                                            <div class="col-2">
                                                <img src="./View/Anh/anh-gai-xinh-deo-kinh-toc-ngan-2k4-3.jpg" alt="">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-primary m-0  mb-1" style="font-weight:500;">Nguyễn Công
                                                    Xuân Hùng</p>
                                                <p class="m-0  mb-1"><?php echo $row['tensp']?>🧡💙💜💜💚</p>
                                                <p> <a class="review mr-4" href="">Thích</a> <a class="review"
                                                        href="">Phản Hồi</a> </p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--  -->
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation example">
  <ul class="pagination d-flex justify-content-center mt-3 mb-5">
    <?php if($page>1):?>
  <?php 
     if($currentPage>1):
     ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=chitiet&page=<?php echo $currentPage-1?>">Previous</a></li>
    <?php  endif;?>
    <!-- for -->
    <?php 
        for($i=1;$i<=$page;$i++):
     ?>
        <?php 
        if($i!=$currentPage){
        ?>
        <?php
        if($i>$currentPage-5&&$i<$currentPage+5):
        ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=chitiet&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php endif;?>
    <?php 
        }else{
    ?>
    <li class="page-item active"><a class="page-link" href="index.php?act=sanpham&action=chitiet&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    
    <?php }?>
   
    <?php endfor?>
    <!-- for -->
    <?php
        if($currentPage<$page):
    ?>
    <li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=chitiet&page=<?php echo $currentPage+1?>">Next</a></li>
            <?php  endif;?>
  </ul>
  <?php endif;?>
</nav>
                                    <!-- Pagination -->
                                </div>
                                <div class="col-6 mt-4">
                                    <!--  -->
                                    <?php 
                                        if(isset($_SESSION['id'])){

                                    ?>
                                    <h4>Thêm Đánh Giá</h4>
                                    <form class="form" method="post" action="index.php?act=binhluan">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <input type="hidden" name="star" id="ipstar" value="">
                                                <p>Đánh Giá</p>
                                                <div class="rate">
                                                    <i class="fa fa-star " data-index=1></i>
                                                    <i class="fa fa-star " data-index=2></i>
                                                    <i class="fa fa-star " data-index=3></i>
                                                    <i class="fa fa-star " data-index=4></i>
                                                    <i class="fa fa-star " data-index=5></i>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <p class="mt-5 mb-0">Thông Tin Của Bạn</p>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4"></label>
                                                        <input type="email" class="form-control" id="inputEmail4"
                                                            placeholder="Họ Tên">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4"></label>
                                                        <input type="password" class="form-control" id="inputPassword4"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress"></label>
                                           <input type="hidden" name="idsp" value="<?php echo $row['id']?>">
                                            <textarea class="w-100" name="cmt" id="" cols="30" rows="10"
                                                placeholder="Đánh Giá..."></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger">Gửi đi</button>
                                        </div>
                                    </form>
                                    <?php }else{?>
                                        <div class="justify-content-center d-flex align-items-center mt-5 ">
                                            <a  class="pt-2 text-white btn btn-dark" href="index.php?act=login&action=dangnhap_user">Vui Lòng Đăng Nhập Để Bình Luận</a>
                                        </div>
                                        <?php }?>
                                    <!--  -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h5 class="ml-2 mt-3">Thông Tin Sản Phẩm</h5>
                        <table class="w-100 mt-2">
                          
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    Thương hiệu
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Converse
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    Xuất xứ thương hiệu
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Mỹ
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    Sản xuất tại
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Việt Nam
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    SKU
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Vải Canvas
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    Hướng dẫn bảo quản
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Tránh mang sản phẩm khi trời mưa hoặc thời tiết xấu để chúng không bị ướt dẫn đến bong tróc.<br>
                                    Cất giữ sản phẩm ở nơi thoáng mát để giữ gìn chất lượng của sản phẩm ở mức tốt nhất.<br>
                                    Lau chùi sản phẩm thường xuyên để tránh bụi.
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    Chế độ bảo hành
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Bảo hành chính hãng 1 tháng theo phiếu bảo hành
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="p-2" style="width: 50%;">
                                    Quy cách đóng gói
                                </td>
                                <td class="p-2" style="width: 50%;">
                                    Giày<br>
                                    Hộp giày<br>
                                    Túi đựng Converse<br>
                                    Phiếu bảo hành chính hãng<br>
                                </td>
                            </tr>                                                                 
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('.review.like').click(function(){
    //           let id=$(this).attr('id');
    //           $.ajax({
    //                 url:"index.php?act=binhluan",
    //                 type:"get",
    //                 data:"type=like&idcmt="+id,
    //                 success : function (result){
    //                 },
    //             });
    //     });
    //     $('.review.dislike').click(function(){
    //           let id=$(this).attr('id');
    //           console.log(id)
    //           $.ajax({
    //                 url:"index.php?act=binhluan",
    //                 type:"get",
    //                 data:"type=dislike&idcmt="+id,
    //                 success : function (result){
    //                 },
    //             });
    //     });
    // });
   
    // let rv=document.querySelectorAll('.review.like')
    //     rv.forEach(e=>{
    // e.onclick=function(){
    //     if(e.innerHTML=="Bỏ Thích"){
    //         // e.innerHTML="Thích";
    //         $.ajax({
    //                 url : "index.php?act=binhluan",
    //                 type : "post",
    //                 async:false
    //                 data : {
    //                      'idcmt':e.dataset.id,
    //                 },
    //                 success : function (result){
                       
    //                 }
    //             });
    //     }else{
    //         // e.innerHTML="Bỏ Thích";
    //     }
    // }
            
    //     })
        
    let stars =document.querySelectorAll('.rate .fa-star');
    let flag=true;
    function clear(){
        stars.forEach(e=>{
            e.classList.remove("text-warning")
        })
    }
   stars.forEach((el,i)=>{
        el.onmouseleave=function(e){
    if(flag==true){
            for(var e=0;e<=i;e++){
                stars[e].classList.remove('text-warning')
            }
    }
        }
        el.onmouseenter=function(){
            for(var ed=0;ed<=i;ed++){
                if(flag!=false){
                    stars[ed].classList.add('text-warning');
                }
            }
        }
          stars[i].onclick=function(e){
                    clear()
                    document.getElementById('ipstar').value=el.dataset.index;
                    for(var c=0;c<=i;c++){
                        stars[c].classList.add('text-warning');
                    }
                    flag=false;
                }
})
// let btn1 =document.querySelector('button.btn1');
// let btn2 =document.querySelector('button.btn2');
// let btn3 =document.querySelector('button.btn3');
// btn1.onclick=function(){
//         document.getElementById('collapseOne').classList.toggle('show');
// }
// btn2.onclick=function(){
//         document.getElementById('collapseTwo').classList.toggle('show');
// }
// btn3.onclick=function(){
//         document.getElementById('collapseThree').classList.toggle('show');
// }
</script>
    <!-- dangiasanpham -->



    <!-- CHitietsanpham -->

   