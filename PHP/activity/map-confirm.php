<?php 
header("Content-Type: text/html; charset=utf-8");
  include("connMysql.php");
  $sql_query1 = "SELECT * FROM `activity`";
  $result = mysql_query($sql_query1);
  $resultactivity = mysql_query($sql_query1);
  while($row_result=mysql_fetch_assoc($result))
    {
    	if($_GET["lat"]==$row_result["latitude"]&&$_GET["lng"]==$row_result["longitude"])
    	{
    		$id=$row_result["id"];
    		$max=$row_result["mix_amount"];
    	}
    }


if(isset($_POST["action"])&&($_POST["action"]=="add")){

  $sql_query = "INSERT INTO `visit` (`name` ,`userid`,`lat`,`lng`,`activity_id`) VALUES (";
  $sql_query .= "'".$_POST["name"]."',";
  $sql_query .= "'".$_POST["userid"]."',";
   $sql_query .= "'".$_POST["lat"]."',";
    $sql_query .= "'".$_POST["lng"]."',";
  $sql_query .= "'".$_POST["activity_id"]."')";
  mysql_query($sql_query);
  //重新導向回到主畫面
  header("Location:map-confirm.php?mid=$_GET[mid]&lat=$_GET[lat]&lng=$_GET[lng]");
}

  $str;
  $sql_visit = "SELECT * FROM `visit`";
  $resultvisit = mysql_query($sql_visit);
  $resultvisit1 = mysql_query($sql_visit);
   while($row_result=mysql_fetch_assoc($resultvisit))
    {
    		if($_GET["lat"]==$row_result["lat"]&&$_GET["lng"]==$row_result["lng"])
	    	{
	    		if($_GET["mid"]==$row_result["userid"])
	    		{
	    			$str="ture";
	    		}
	    	}	   	
    }

$recent=0;
  while($row_result=mysql_fetch_assoc($resultvisit1))
    {
    	if($id==$row_result["activity_id"])
    	{
    		$recent=$recent+1;
    	}
    }  
 ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
	</style>
</head>
<body>
<div style="text-align: center">
<?php if($max==$recent){ if($str=="ture"){  ?>
<input type="submit" class="button" name="" width="100%" value="已加入">  
<?php }else{ ?>
<input type="submit" class="button" name="" width="100%" value="已額滿">  
<?php }} else{ ?>
<?php if($str==""){ ?>
	<form action="" method="post" name="formAdd" id="formAdd">	
	<input type="hidden" name="name" value="123">
	<input type="hidden" name="userid" value="<?php echo $_GET["mid"] ?>">
	<input type="hidden" name="lat" value="<?php echo $_GET["lat"] ?>">
	<input type="hidden" name="lng" value="<?php echo $_GET["lng"] ?>">
	<input type="hidden" name="activity_id" value="<?php echo $id; ?>">
	<input name="action" type="hidden" value="add">
	<input type="submit" class="button" name="" width="100%" value="加入">   
	</form>	
<?php } else{ ?>
<input type="submit" class="button" name="" width="100%" value="已加入">  
<?php }} ?>
</div>	
</body>
</html>