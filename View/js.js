let btn=document.querySelector('.btn-search')
let ip=document.querySelector('.ip-search')
btn.onmouseover=function(e){
    ip.style.display="block"
   ip.onmouseover=function(){
    ip.style.display="block"
   }
}
btn.onmouseout=function(){
    ip.style.display="none"
        ip.onmouseout=function(e){
            if(e.target.value!=""){
                ip.style.display="block"
            }else{
                ip.style.display="none"
            }
           }
}
        

           
           
       
   