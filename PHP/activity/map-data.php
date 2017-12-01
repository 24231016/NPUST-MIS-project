<?php 
header("Content-Type: text/html; charset=utf-8");
  include("connMysql.php");
  $sql_query = "SELECT * FROM `activity`";
  $result = mysql_query($sql_query);
  while($row_result=mysql_fetch_assoc($result))
    {
    	if($_GET["lat"]==$row_result["latitude"]&&$_GET["lng"]==$row_result["longitude"])
    	{
    		echo '<font color="blue">活動內容:</font>'.$row_result["activity_context"];
    	}
    }	
 ?>