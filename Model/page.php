<?php 
        class page{
            function getTotalPage($count,$limit){
                $page=$count%$limit?ceil($count/$limit):$count/$limit;
                return $page;
            }
            function getStart($currentPage,$limit){
                if(!isset($_GET['page']) || $currentPage==1){
                    $start=0;
                }else{
                    $start=($currentPage-1)*$limit;
                }
                return $start;
            }
            // function getStart2($currentPage){
            //     if(!isset($_GET['page']) || $currentPage==1){
            //         $start=0;
            //     }else{
            //         $start=($currentPage-1)*4;
            //     }
            //     return $start;
            // }
        }
    



?>