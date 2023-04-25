<?php
if(!isset($_GET['page'])&& isset($_POST['search'])){
    $_SESSION['key'] = $_POST['search'];
}
$db = new sanpham();
$kq = $db->getspsearch($_SESSION['key']);
?>
<?php 
if (!empty($_SESSION['key']) && !empty($kq->fetch())) {
$count = $db->getspsearch($_SESSION['key'])->rowCount();
 echo $count;
$limit=6;
$pg = new page();
$page = $pg->getTotalPage($count,$limit);
$currentPage=isset($_GET['page'])?$_GET['page']:1;
$start=$pg->getStart($currentPage,$limit);
?>
<div class="vungsanpham mt-5" ng-controller="phukienkhac">
<div class="container mt-5 mb-5">
    <h3 class="text-center">Kết Quả Tìm Kiếm Cho "<?php echo $_SESSION['key'];?>"</h3>
    <hr width="100%" style="border-top:2px solid black ;">
    <div class="row mt-5">
    <?php
    $result = $db->timKiemSanPham($_SESSION['key'],$start,$limit);
    while ($row = $result->fetch()):
    ?>
        <div class="col-4 mt-5">
            <div class="card">
              <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']; ?>"><img class="card-img-top" src="./View/Anh/<?php echo $row['img'] ?>" alt=""></a>
                <div class="card-body text-center">
                    <h5 class="card-title "><?php echo $row['tensp'] ?></h5>
                    <p class="card-text text-danger mb-4"><?php echo number_format($row['gia']) ?> VND</p>
                    <a class="hieuung" href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $row['id']; ?>">Thêm Vào Giỏ</a>

                </div>
            </div>
        </div>

       <?php endwhile;?>

    </div>
    <nav aria-label="Page navigation example">
<ul class="pagination d-flex justify-content-center mt-3 mb-5">
<?php
if($page>1):
if ($currentPage > 1):
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=search&page=<?php echo $currentPage - 1 ?>">Previous</a></li>
<?php endif;?>
<?php
for ($i = 1; $i <= $page; $i++):
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=search&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

<?php endfor?>
<?php
if ($currentPage < $page):
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=sanpham&action=search&page=<?php echo $currentPage + 1 ?>">Next</a></li>
    <?php endif;endif;?>
</ul>
</nav>
</div>
</div>
<?php }
else
{       ?>
        <h3 class="mt-5 mb-5 text-center pt-3 pb-5"> TỪ KHÓA "<?php echo $_SESSION['key'];?>" TÌM KIẾM KHÔNG CÓ KẾT QUẢ PHÙ HỢP. THỬ TÌM KIẾM VỚI TỪ KHÓA KHÁC.</h3>
    <?php }?>
