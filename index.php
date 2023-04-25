        <?php 
              session_start();
            //  include "./Model/giohang.php";
            // include "./Model/connect.php";
            // include "./Model/sanpham.php";
            // include "./Model/user.php";
            // include "./Model/thanhtoan.php";
            include "./Model/class.smtp.php";
            include "./Model/class.phpmailer.php";
           set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
           spl_autoload_extensions('.php');
           spl_autoload_register();
        ?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Angular js -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./View/Chitiet_sanpham/ctsp.css">
    <link rel="stylesheet" href="./View/Css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
        
</head>

<body style="overflow-x:hidden">

    <?php 
        if(!isset($_SESSION['admin_id'])){
            include "./View/header.php";
        }else{
            include "./View/header_admin.php";
        }
  
   
           
                    $ctrl="trangchu";
                    if(isset($_GET['act'])){
                        if($_GET['act']!="sanpham"){
                            unset($_SESSION['order']);
                        }
                        if($_GET['act']!="sanpham_admin" || $_GET['action']!="hanghoa"){
                            unset($_SESSION['searchhanghoa']);
                        }
                        $ctrl=$_GET['act'];
                     include "./Controller/$ctrl.php";
                    }else{
                        if(isset($_SESSION['admin_id'])){
                            include "./View/Admin/hanghoa.php";
                        }
                        else if(isset($_SESSION['id'])){
                            include "./View/trangchu.php";
                        }else{
                           include "./Controller/$ctrl.php";
                        }
                    }
                   
                    
                  
                if(!isset($_SESSION['admin_id'])){
                    include "./View/footer.php";
                }
            
       
        
    ?>
  
    <script src="./View/js.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    </body>
</html>