<?php 
class danhsachyeuthich{
    public function them($id){
        $db = new sanpham();
        $kq = $db->getctsp($id);
        $_SESSION['dsyeuthich'][]=$kq;
    }
    public function xoa($id){
        unset($_SESSION['dsyeuthich'][$id]);
        if(count($_SESSION['dsyeuthich'])==0){
            unset($_SESSION['dsyeuthich']);
        }
    }
}
?>