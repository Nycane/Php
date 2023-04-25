 
 <?php 
 if(isset($_GET['type'])){
  $type=$_GET['type'];
 }
 ?>
 <?php 
      if($type=="thang"):
 ?>
<meta charset="UTF-8">
    
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
           var data = new google.visualization.DataTable();
            var rows= new Array();
            var tenhh = new Array();
            var soluongban=new Array();
            var datatenhh=0;
            var soluonghh=0;
            <?php
            if(isset($_GET['q'])&&!empty($_POST['month'])&&!empty($_POST['year'])){
              $hh = new sanpham_admin();
              $month=$_POST['month'];
              $year=$_POST['year'];
              $result=$hh->thongkehanghoatheothang($month,$year);
            }else{
              $hh = new sanpham_admin();
              $date = getdate();
              $year=$date['year'];
              $month=$date['mon']; 
              $result=$hh->thongkehanghoathang($month,$year);
            }
              while($row=$result->fetch()):
                $tenhh=$row['tensp'];
                $slb=$row['soluongban'];
                echo "tenhh.push('".$tenhh."');";
                echo "soluongban.push('".$slb."');";;
              endwhile;
             ?>
             for(var i =0;i<tenhh.length;i++){
              datatenhh=tenhh[i];
              soluonghh=parseInt(soluongban[i]);
              rows.push([datatenhh,soluonghh]);
             }
             data.addColumn("string","Hàng Hóa");
             data.addColumn("number","Số Lượng Bán");
             data.addRows(rows);
            
             <?php
             if(isset($_GET['q'])&&!empty($_POST['month'])&&!empty($_POST['year'])){
                $year=$_POST['year'];
                $month=$_POST['month'];
             }else{
              $date = getdate();
              $year=$date['year'];
              $month=$date['mon']; 
             }     
             ?>
            
             var option={
              title:"Thống kê số lượng bán của hàng hóa <?php echo "Tháng $month Năm $year"?>",
              "width":600,
              "height":400,
              "backgroundColor":"#ffffff",
              is3D:true
             }
             var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
             chart.draw(data,option);
             console.log(data);
             if(data.cache.length==0){
              document.getElementById('chart_div').innerHTML="<img src='https://suduongsinh.minhlong.com/templates/images/404-img_03.png  '>";
              document.getElementById('chart_div').style="display:flex;justify-content:center;align-items:center;margin-top:200px"
              return;
             }
	 }
    </script>
        <div class="thongke">
          <div class="container">
            <div class="row">
              <div class="col-3"></div>
              <div class="col-6">

              <form action="index.php?action=thongke&act=thongke&type=thang&q=monthyear" method="post">
                <div style="display:inline-block;">
                <input name="month" type="text" placeholder="Nhập Tháng...">
                  <input type="text" type="nam" name="year" placeholder="Nhập năm..." >
                  <button type="submit" class="btn btn-danger">Tìm</button>
                </div>
                </form>
              <div style=" width:100%;  float: left;"   id="chart_div"></div>
              </div>
              <div class="col-3"></div>
            </div>
          </div>
      </div>

<?php endif; ?>

<?php 
if($type=="bannhieunhat"):
?>
     <meta charset="UTF-8">
    
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
           var data = new google.visualization.DataTable();
            var rows= new Array();
            var tenhh = new Array();
            var soluongban=new Array();
            var datatenhh=0;
            var soluonghh=0;
            <?php
            $hh = new sanpham_admin();
            $result=$hh->thongkehanghoa();
              while($row=$result->fetch()):
                $tenhh=$row['tensp'];
                $slb=$row['soluongban'];
                echo "tenhh.push('".$tenhh."');";
                echo "soluongban.push('".$slb."');";;
              endwhile;
             ?>
             for(var i =0;i<tenhh.length;i++){
              datatenhh=tenhh[i];
              soluonghh=parseInt(soluongban[i]);
              rows.push([datatenhh,soluonghh]);
             }
             data.addColumn("string","Hàng Hóa");
             data.addColumn("number","Số Lượng Bán");
             data.addRows(rows);
             console.log(data.cache)
             var option={
              title:"Thống kê số lượng bán của hàng hóa",
              "width":600,
              "height":400,
              "backgroundColor":"#ffffff",
              is3D:true
             }
             var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
             chart.draw(data,option);
	 }
    </script>
        <div class="thongke">
          <div class="container">
            <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
              <div style=" width:100%;  float: left;"   id="chart_div"></div>
              </div>
              <div class="col-3"></div>
            </div>
          </div>
      </div>
 <?php endif; ?>
 