<?php
    class admin{
        public function dangnhap($email,$pass){
            $dk = new connect();
            $select ="select * from admin where email='$email' and pass='$pass'";
            $result=$dk->getlist($select);  
            return $result->fetch();
        }
        public function thaydoimatkhau($id,$mkmoi){
            $us = new connect();
            $query="Update admin set pass='$mkmoi' where id=$id";
            $result=$us->themsuaxoa($query);
            return $result;
        }
        public function kiemtramatkhau($id,$pass){
            $dk = new connect();
            $select ="SELECT * from admin where id=$id and pass='$pass'";
          $result=$dk->getctsp($select);
          return $result->fetch();
        }
        public function validateTdmk($mkcu,$mkmoi,$nlmkmoi){
            if(empty($mkcu)){
                $_SESSION['mkcuErr']="Vui Lòng Không Được Để Trống";
            }else{
                if(empty($this->kiemtramatkhau($_SESSION['admin_id'],md5($_POST['mkcu'])))){
                    $_SESSION['mkcuErr']="Mật Khẩu Cũ Không Chính Xác";
                }else{
                    unset($_SESSION['mkcuErr']);
                }
            }
            if(empty($mkmoi)){
                $_SESSION['mkmoiErr']="Vui Lòng Không Được Để Trống";
            }else{
                if(!preg_match("/^[A-Z][\w\.@#$%&^*()]+$/",$mkmoi)){
                      $_SESSION['mkmoiErr']="Vui Lòng Nhập Đúng Định Dạng Mật Khẩu";
                }else{
                    unset($_SESSION['mkmoiErr']);
                }
            }
            if(empty($nlmkmoi)){
                $_SESSION['nlmkmoiErr']="Vui Lòng Không Được Để Trống";
            }else{
                if($mkmoi!=$nlmkmoi){
                    $_SESSION['nlmkmoiErr']="Mật Khẩu Nhập Lại Không Chính Xác";
                }else if(!preg_match("/^[A-Z][\w\.@#$%&^*()]+$/",$nlmkmoi))
                {
                    $_SESSION['nlmkmoiErr']="Vui Lòng Nhập Đúng Định Dạng Mật Khẩu";
                    
                }else{
                    unset($_SESSION['nlmkmoiErr']);

                }
            }
            if(!isset($_SESSION['mkcuErr'])&&!isset($_SESSION['mkmoiErr'])&&!isset($_SESSION['nlmkmoiErr'])){
                return true;
            }else{
                return false;
            }
        }
    }
 
?>