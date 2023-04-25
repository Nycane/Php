<?php 
    class thanhvien_admin{
        public function getAllTv(){
            $db = new connect();
            $select="select * from admin";
           return $db->getlist($select);
        }
        public function getAllTvPage($start,$limit){
            $db = new connect();
            $select="select * from admin limit $start,$limit";
           return $db->getlist($select);
        }
        public function addTv($hoten,$email,$password,$vaitro){
            $db = new connect();
            $query="insert into admin(admin_name,email,pass,vaitro) 
            values('$hoten','$email','$password',$vaitro)";
            $db->themsuaxoa($query);
        }
        public function updateTv($idtv,$hoten,$email,$password,$vaitro){
            $db = new connect();
            $query="update admin set admin_name='$hoten',email='$email' ,pass='$password' , vaitro='$vaitro' where id=$idtv";
            $db->themsuaxoa($query);
        }
        public function verifyEmailUpdate($email,$idtv){
            $db = new connect();
            $select ="select * from admin where email='$email' and id!=$idtv";
            $result=$db->getlist($select);  
            return $result->fetch();
        }
        public function verifyEmail($email){
            $db = new connect();
            $select ="select * from admin where email='$email'";
            $result=$db->getlist($select);  
            return $result->fetch();
        }
        public function verifyPassWord($id,$pass){
            $db = new connect();
            $select ="select * from admin where pass='$pass' and id=$id";
            $result=$db->getlist($select);  
            return $result->fetch();
        }
        public function deleteTv(){
            $db = new connect();
            $query="";
            $db->themsuaxoa($query);
        }
        public function getvaitro($id){
            $db = new connect();
            $select="select vaitro from phanquyen_thanhvien where id=$id";
           $kq= $db->getctsp($select);
            return $kq->fetch();
        }
        public function getphanquyen(){
            $db = new connect();
            $select="select * from phanquyen_thanhvien where id !=0";
          return $db->getctsp($select);
        }
        public function getTvInstance($id){
            $db = new connect();
            $select="select * from admin where id = $id";
          return $db->getctsp($select);
        }
      
    }
?>