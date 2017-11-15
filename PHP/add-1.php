<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
$sql_db = "SELECT * FROM `myguests` WHERE `id`=".$_GET["id"];
$result = mysql_query($sql_db);
$row_result=mysql_fetch_assoc($result);

if(isset($_POST["action"])&&($_POST["action"]=="add")){	
	$sql_query = "INSERT INTO `myguests` SET ";
	$sql_query .= "`firstname`='".$_POST["firstname"]."',";
	$sql_query .= "`active_title`='".$_POST["active_title"]."',";
	$sql_query .= "`x`='".$_POST["x"]."',";
	$sql_query .= "`y`='".$_POST["y"]."'";
	$sql_query .= "WHERE `id`=".$_POST["id"];	
	mysql_query($sql_query);
	//重新導向回到主畫面
	header("Location:data.php");
}


if(isset($_POST["action"])&&($_POST["action"]=="delete")){  
  $sql_query1 = "DELETE FROM `myguests` WHERE `id`=".$_POST["id"];
  mysql_query($sql_query1);
  //重新導向回到主畫面
  header("Location:data.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post" name="formFix" id="formFix">
	 <table border="0" align="center" cellpadding="4" width="100%">
    <tr>
      <td>姓名<p><input type="text" name="firstname" id="firstname" value="<?php echo $row_result["firstname"];?>"></p></td>
    </tr>
    <tr>
      <td>活動資訊<p><input type="text" name="active_title" id="active_title" value="<?php echo $row_result["active_title"];?>"></p></td>
    </tr>
    <tr>
      <td>X軸<p><input type="text" name="x" id="x" value="<?php echo $row_result["x"];?>"></p></td>
    </tr>
     <tr>
      <td>Y軸<p><input type="text" name="y" id="y" value="<?php echo $row_result["y"];?>"></p></td>
    </tr>
    <tr>
    	<td>
      <input name="id" type="hidden" value="<?php echo $row_result["id"];?>">
      <input name="action" type="hidden" value="add">
      <input type="submit" name="button" id="button" value="更新">
    	</td>	
    </tr>
  </table>
</form>
</body>
</html>