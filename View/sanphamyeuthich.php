<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    if(isset($_SESSION['dsyeuthich']) && count($_SESSION['dsyeuthich'])>0){
    ?>
      <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table">
            <thead>
                <tr>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Hình</th>
               </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        if(isset($_SESSION['dsyeuthich']))
                            foreach($_SESSION['dsyeuthich'] as $index => $e):
                        
                ?>
                <td> <a href="index.php?act=sanpham&&action=chitiet&&id=<?php echo $e['id'];?>"><?php echo $e['tensp'] ?></a></td>
                <td><img src="./View/Anh/<?php echo $e['img']?>" alt="" style="width:100px"></td>
                <td><a href="index.php?act=dsyeuthich&&action=xoayeuthich&&index=<?php echo $index ?>" class ="btn btn-danger">Xóa</a></td>
                </tr>
                <?php
                endforeach;   
                ?>
            </tbody>
            </table>
            </div>
        </div>
      </div>
      <?php }else{?>
        <div class="container mt-5 mb-5 pt-3">
            <div class="row">
                <div class="col-12">
                <div class="text-center">
                <h1>Chưa có sản phẩm yêu thích nào !!!</h1>
            </div>
                </div>
            </div>
        </div>
           
        <?php }?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>