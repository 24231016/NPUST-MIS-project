<?php 
  header("Content-Type: text/html; charset=utf-8");
  include("connMysql.php");

  $sqluser = "SELECT * FROM `user`";
  $resultuser = mysql_query($sqluser);
  while($row_result=mysql_fetch_assoc($resultuser))
    {
      if($_GET["mid"]==$row_result["id"])
      {
        $name=$row_result["name"];
      }
    }

if(isset($_POST["action"])&&($_POST["action"]=="add")){
  $query_insert = "INSERT INTO `activity` (`name`,`activity_title`,`activity_context`,`activity_category`,`userid`,`latitude`,`longitude`,`mix_amount`,`activity_start`,`final-time`) VALUES (";
  $query_insert .= "'".$_POST["name"]."',";
  $query_insert .= "'".$_POST["activity_title"]."',";
  $query_insert .= "'".$_POST["activity_context"]."',";
  $query_insert .= "'".$_POST["activity_category"]."',";
  $query_insert .= "'".$_POST["userid"]."',";
  $query_insert .= "'".$_POST["latitude"]."',";
  $query_insert .= "'".$_POST["longitude"]."',";
  $query_insert .= "'".$_POST["mix_amount"]."',";
  $query_insert .= "'".$_POST["activity_start"]."',";
  $query_insert .= "'".$_POST["final-time"]."')";
  mysql_query($query_insert);
  //重新導向回到主畫面
  header("Location: activity-data.php?mid=$_GET[mid]");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link href='http://tony1966.16mb.com/jquery/jquery-ui-timepicker-addon.css' rel='stylesheet'>
  <script type="text/javascript" src="http://tony1966.16mb.com/jquery/jquery-ui-timepicker-addon.js"></script>
  <script type='text/javascript' src='http://tony1966.16mb.com/jquery/jquery-ui-sliderAccess.js'></script>
      <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/docs/4.0/examples/signin/signin.css" rel="stylesheet">
  <style>
    article,aside,figure,figcaption,footer,header,hgroup,menu,nav,section {display:block;}
    body {font: 150.5% "Trebuchet MS", sans-serif; margin: 50px;}
    input[type=text] {
    width: 100%;
    font-size: 80px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    outline: none;
}
	input[type=submit] {
    background-color: #4CAF50;
    width: 100%;
    font-size: 70px;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
	h1{
		font-size: 120px;
	}
	#mainselection select {
   border: 0;
   color: #EEE;
   background: transparent;
   font-size: 70px;
   font-weight: bold;
   padding: 2px 10px;
   width: 378px;
   *width: 100%;
   *background: #58B14C;
   -webkit-appearance: none;
}

#mainselection {
   overflow:hidden;
   width:100%;
   font-size: 70px;
   -moz-border-radius: 9px 9px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 9px 9px 9px 9px;
   box-shadow: 1px 1px 11px #330033;
   background: #fff url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}
  </style>
</head>
<body>
<div style="text-align: center;">
<h1>創建活動</h1>
<br/><br/><br/><br/><br/>	
  <form action="" method="post" name="formAdd" id="formAdd">  
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <input type="hidden" name="userid" value="<?php echo $_GET["mid"] ?>">
  <input type="text" name="activity_title" placeholder="請填入活動名稱" required>
  <input type="text" name="activity_context" placeholder="請填入活動內容" required>
  <select name="activity_category" id="mainselection" placeholder="請選擇活動類別" required>
  <option value="一般活動">一般活動</option>
  <option value="餐飲活動">餐飲活動</option>
  <option value="旅遊活動">旅遊活動</option>
  <option value="其他活動">其他活動</option>
  <option value="運動活動">運動活動</option>
 </select>
  <input type="hidden" name="latitude" value="<?php echo $_GET["lat"] ?>">
  <input type="hidden" name="longitude" value="<?php echo $_GET["lng"] ?>">
  <input type="text" name="mix_amount" placeholder="請填入活動人數" required>
  <input id="datetimepicker1" name="activity_start" type="text" value="" placeholder="請選擇活動開始日期" required/>
  <input id="datetimepicker2" name="final-time" type="text" value="" placeholder="請選擇活動截止日期" required/>
  <script language="JavaScript">
    $(document).ready(function(){ 
      var opt={
        //以下為日期選擇器部分
        dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
        dayNamesMin:["日","一","二","三","四","五","六"],
        monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        prevText:"上月",
        nextText:"次月",
        weekHeader:"週",
        showMonthAfterYear:true,
        dateFormat:"yy-mm-dd",
        //以下為時間選擇器部分
        timeOnlyTitle:"選擇時分秒",
        timeText:"時間",
        hourText:"時",
        minuteText:"分",
        secondText:"秒",
        millisecText:"毫秒",
        timezoneText:"時區",
        currentText:"現在時間",
        closeText:"確定",
        amNames:["上午","AM","A"],
        pmNames:["下午","PM","P"],
	    showSecond:true,
        timeFormat:"HH:mm:ss"
        };
      $("#datetimepicker1").datetimepicker(opt);
      $("#datetimepicker2").datetimepicker(opt);
      });
  </script>
  <input name="action" type="hidden" value="add">
  <div style="width:100%; position:fixed; left:0; bottom:0;">
  <input type="submit" class="button" name="" value="確認">  
  </div> 
  </form> 
  </div>	
</body>
</html>