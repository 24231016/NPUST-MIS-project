<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");


if(isset($_POST["action"])&&($_POST["action"]=="add")){

if(!@mysql_select_db("myapp"))die("資料庫選擇失敗");

$sql_query="INSERT INTO 'myguests'('firstname','active_title','x','y')VALUES(";
$sql_query .= "`firstname`='".$_POST["firstname"]."',";	
$sql_query .= "`active_title`='".$_POST["active_title"]."',";

$sql_query .= "`x`='".$_POST["x"]."',";
$sql_query .= "`y`='".$_POST["y"]."')";
mysql_query($sql_query);

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
      <td>活動名稱<p><input type="text" name="active_title" id="active_title" value="<?php echo $row_result["active_title"];?>"></p></td>
    </tr>
    <tr>
      <td>X軸<p><input type="text" name="x" id="x" value="<?php echo $row_result["x"];?>"></p></td>
    </tr>
    <tr>
      <td>Y軸<p><input type="text" name="y" id="y" value="<?php echo $row_result["y"];?>"></p></td>
    </tr>


    <tr>
    	<td>
     
      <input name="action" type="hidden" value="add">
      <input type="submit" name="button" id="button" value="新增">
    	</td>	
    </tr>
  </table>
</form>
 </body>
 </html>