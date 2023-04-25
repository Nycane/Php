<?php 
    class connect{
        var $db=null;
        public function __construct(){
            $dsn="mysql:host=localhost;dbname=website_php";
            $user="root";
            $pass="";
            try{
                $this->db= new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            }catch(\Throwable $th){
                echo "That Bai";
            }
        }
        public function getlist($select){
          return $result=$this->db->query($select);
          
        }
        public function getctsp($select){
            return $result=$this->db->query($select);
        }

        public function themsuaxoa($select){
            return $this->db->exec($select);
        }
    }
?>