<?php
//index.php

// $error = '';
// $name = '';
// $email = '';
// $subject = '';
// $message = '';

// function clean_text($string)
// {
// 	$string = trim($string);
// 	$string = stripslashes($string);
// 	$string = htmlspecialchars($string);
// 	return $string;
// }

// if(isset($_POST["submit"]))
// {
// 	if(empty($_POST["name"]))
// 	{
// 		$error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
// 	}
// 	else
// 	{
// 		$name = clean_text($_POST["name"]);
// 		if(!preg_match("/^[a-zA-Z ]*$/",$name))
// 		{
// 			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
// 		}
// 	}
// 	if(empty($_POST["email"]))
// 	{
// 		$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
// 	}
// 	else
// 	{
// 		$email = clean_text($_POST["email"]);
// 		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
// 		{
// 			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
// 		}
// 	}
// 	if(empty($_POST["subject"]))
// 	{
// 		$error .= '<p><label class="text-danger">Subject is required</label></p>';
// 	}
// 	else
// 	{
// 		$subject = clean_text($_POST["subject"]);
// 	}
// 	if(empty($_POST["message"]))
// 	{
// 		$error .= '<p><label class="text-danger">Message is required</label></p>';
// 	}
// 	else
// 	{
// 		$message = clean_text($_POST["message"]);
// 	}
// 	if($error == '')
// 	{
// 		require './class/class.phpmailer.php';
// 		$mail = new PHPMailer;
// 		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
// 		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
// 		$mail->Port = 587;								//Sets the default SMTP server port
// 		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
// 		$mail->Username = 'hung0925068118@gmail.com';					//Sets SMTP username
// 		$mail->Password = 'afyitoctdsovnprk';//Phplytest20@php					//Sets SMTP password
// 		$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
// 		$mail->From = 'hung0925068118@gmail.com';					//Sets the From email address for the message
// 		$mail->FromName = 'Ly';				//Sets the From name of the message
// 		$mail->AddAddress($_POST["email"], $_POST["name"]);		//Adds a "To" address
// 		//$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
// 		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
// 		$mail->IsHTML(true);							//Sets message type to HTML				
// 		$mail->Subject = $_POST["subject"];				//Sets the Subject of the message
// 		$mail->Body = $_POST["message"];				//An HTML or plain text message body
// 		if($mail->Send())								//Send an Email. Return true on success or false on error
// 		{
// 			$error = '<label class="text-success">Thank you for contacting us</label>';
// 		}
// 		else
// 		{
// 			$error = '<label class="text-danger">There is an Error</label>';
// 		}
// 		$name = '';
// 		$email = '';
// 		$subject = '';
// 		$message = '';
// 	}
// }
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <form action="index.php?act=login&&action=quenmatkhau" method="post" name="frm">
                <div class="card">
                    <div class="card-header"style="background-image: linear-gradient(to right, purple, pink);" >
                        <h3 class="text-center text-white" >Quên Mật Khẩu</h3>
                    </div>
                    <div class="card-body"style="background-image:linear-gradient(purple, pink) ;">
                        <div class="form-group">
                          <label for="" class="text-white-50">Nhập Email </label>
                          <input type="email" name="email"  class="form-control" placeholder="Nhập Email" aria-describedby="helpId">                              
                          <span id="kq_hoten" class="text-danger "> </span>
                        </div>
                          <div class="dangnhap text-center">
                          <input type="submit" name="quenmk" class="btn btn-warning"></input>
                          </div>               
                    </div>  
                </div>
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>