<?php  
  header("Content-Type: text/html; charset=utf-8");
  include("connMysql.php");
  $choose1="一般活動";
  $choose2="餐飲活動";
  $choose3="旅遊活動";
  $choose4="其他活動";
  $choose5="運動活動";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.boder1{
	  background-color: #ccffdd; padding: 6px;
      position: absolute; left: 0px; right: 0px;bottom: 0px;
      top: 0%; 
      font-size: 50px;
      text-align: center;
		}
	.boder2{
	  background-color: #ccffdd; padding: 6px;
      position: absolute; left: 0px; right: 0px;bottom: 0px;
      top: 20%; 
      font-size: 50px;
      text-align: center;
		}
	.boder3{
	  background-color: #ccffdd; padding: 6px;
      position: absolute; left: 0px; right: 0px;bottom: 0px;
      top: 40%; 
      font-size: 50px;
      text-align: center;
		}
	.boder4{
	  background-color: #ccffdd; padding: 6px;
      position: absolute; left: 0px; right: 0px;bottom: 0px;
      top: 60%;
      font-size: 50px;
      text-align: center; 
		}
	  .boder5{
	  background-color: #ccffdd; padding: 6px;
      position: absolute; left: 0px; right: 0px;bottom: 0px;
      top: 80%; 
      font-size: 50px;
      text-align: center;
		}
		img{
			width: 100%;
		}
	</style>
</head>
<body style="width: 100%;height: 100%;">

	<div class="boder1"><a href="map.php?mid=<?php echo $_GET["mid"]; ?>&choose=<?php echo $choose1; ?>"><img src="https://cp.cw1.tw/files/md5/85/e4/85e4518c8cb39cad9fa4af4688f97306-94350.jpg"></a></div>
	<div class="boder2"><a href="map.php?mid=<?php echo $_GET["mid"]; ?>&choose=<?php echo $choose2; ?>"><img src="http://cw1.tw/CC/images/article/J1427427313250.jpg"></a></div>
	<div class="boder3"><a href="map.php?mid=<?php echo $_GET["mid"]; ?>&choose=<?php echo $choose3; ?>"><img src="http://pic.pimg.tw/playsport/1359604051-1379658451.jpg"></a></div>
	<div class="boder4"><a href="map.php?mid=<?php echo $_GET["mid"]; ?>&choose=<?php echo $choose4; ?>"><img src="http://s3.iguang.co/6c21c9a4/images/person/bloggers/92/9d/4416864/d8f3/6538b95a.jpg"></a></div>
	<div class="boder5"><a href="map.php?mid=<?php echo $_GET["mid"]; ?>&choose=<?php echo $choose5; ?>"><img src="https://fitz.hk/wp-content/uploads/2015/03/%E6%88%91%E9%BB%9E%E8%A7%A3%E9%96%8B%E5%A7%8B%E8%B7%91%E6%AD%A5.png"></a></div>
</body>
</html>