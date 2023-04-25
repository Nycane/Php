<?php 
    $act = "";
    if(isset($_GET['action'])){
        $act=$_GET['action'];
    }
    switch($act){
        case "dangnhap_user":
            include "./View/$act.php";
            break;
        case "dangnhap_admin":
             include "./View/$act.php";
             break;
         case "dangnhap_act":
            if(isset($_POST['email']) && isset($_POST['pass'])){
                $dn= new user();
                echo md5($_POST['pass']);
                echo $_POST['email'];
                $result=$dn->dangnhap($_POST['email'],md5($_POST['pass']));
                // echo "<script>alert($result)</script>";
                if($result){
                    $_SESSION['id']=$result['id'];
                    $_SESSION['ten']=$result['hoten'];
                    echo "<script>alert('Đăng nhập thành công')</script>";
                    // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=trangchu"/>';
                    echo "<script type='text/javascript'>window.top.location='./index.php?act=trangchu';</script>";

                }else{
                    echo "<script>alert('Đăng nhập không thành công')</script>";
                    include "./View/dangnhap_user.php";
                    return;
                }
            }
            include "./View/dangnhap_user.php";
            break;   
          case "dangxuat":
            if($_SESSION['id']){
                unset($_SESSION['id']);  
                unset($_SESSION['ten']); 
                // echo '<meta http-equiv="refresh" content="0; url=./index.php?act=trangchu"/>';
                echo "<script type='text/javascript'>window.top.location='./index.php?act=trangchu';</script>";

            }
             break;

            case "tdmk":
                    if(isset($_SESSION['mkmoiErr'])||isset($_SESSION['mkcuErr'])||isset($_SESSION['nlmkmoiErr'])){
                        unset($_SESSION['mkmoiErr']);
                        unset($_SESSION['mkcuErr']);
                        unset($_SESSION['nlmkmoiErr']);
                    }
                if(isset($_POST['mkcu']) && isset($_POST['mkmoi'])&& isset($_POST['nlmkmoi'])){
                        $us = new user();
                        $result=$us->validateTdmk($_POST['mkcu'],$_POST['mkmoi'],$_POST['nlmkmoi']);
                        if($result==true){
                           $kq=$us->thaydoimatkhau($_SESSION['id'],md5($_POST['mkmoi']));
                              echo "<script>alert('Thay Đổi Mật Khẩu Thành Công')</script>";
                            include "./View/dangnhap_user.php";
                            return;
                        }
                }
                include "./View/tdmk.php";
                break;
                case "quenmatkhau":
                    if(isset($_POST['quenmk'])){
                        if(isset($_SESSION['verify'])){
                            unset($_SESSION['verify']);
                        }
                        $email=$_POST['email'];
                        $db = new user();
                        $kq=$db->getuser($email);
                      if($kq!=false){
                        $code=random_int(1000,9999);
                        $verify=array(
                            "id"=>$code,
                            "email"=>$email
                        );
                        $_SESSION['verify'][]=$verify;

                        $mail = new PHPMailer;
                        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
                        $mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
                        $mail->Port = 587;								//Sets the default SMTP server port
                        $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
                        $mail->Username = 'hung0925068118@gmail.com';					//Sets SMTP username
                        $mail->Password = 'afyitoctdsovnprk';//Phplytest20@php					//Sets SMTP password
                        $mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
                        $mail->From = 'hung0925068118@gmail.com';					//Sets the From email address for the message
                        $mail->FromName = 'NCXH';				//Sets the From name of the message
                        $mail->AddAddress($_POST["email"], "reciever_name");		//Adds a "To" address
                        //$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
                        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
                        $mail->IsHTML(true);							//Sets message type to HTML				
                        $mail->Subject = "Reset Password";				//Sets the Subject of the message
                        $mail->Body = "<h1>Mã Code Của Bạn Là: $code</h1> ";				//An HTML or plain text message body
                        if($mail->Send())								//Send an Email. Return true on success or false on error
                        {
                               echo "<script>alert('Vui lòng kiểm tra email để nhận mã code')</script>";
                               echo "<script type='text/javascript'>window.location='./index.php?act=login&action=laymatkhau';</script>";
                               
                        }
                        else
                        {
                           echo "Mail Error -> ".$mail->ErrorInfo;
                        }
                            include "./View/nhaplaimatkhau.php";
                            return;
                      }else{
                        echo "<script>alert('Địa chỉ email không tồn tại')</script>";
                        echo "<script type='text/javascript'>window.location='./index.php?act=login&action=quenmatkhau';</script>";
                        return;
                      }
                    }
                    include "./View/quenmatkhau.php";
                    break;
                case "laymatkhau":
                    if(isset($_POST['quenmk'])){
                        if($_POST['code']!=$_SESSION['verify'][0]['id']){
                               echo "<script>alert('Mã Code Không Chính Xác Vui Lòng Nhập Lại')</script>";
                               include "./View/nhaplaimatkhau.php";
                               return;
                        }else{
                            $db = new user();
                            $db->laylaimatkhau($_SESSION['verify'][0]['email'],md5($_POST['mkmoi']));
                          echo "<script>alert('Cập nhật mật khẩu thành công')</script>";
                          unset($_SESSION['verify']);
                          echo "<script type='text/javascript'>window.location='./index.php?act=trangchu&action=trangchu';</script>";
                            return;
                        }
                    }
                    include "./VIew/nhaplaimatkhau.php";
                    break;

    }

?>