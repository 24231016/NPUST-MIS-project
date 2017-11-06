<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
$sql_query = "SELECT * FROM `myguests`";
  $result= mysql_query($sql_query);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style>
 		table{
 			width: 100%;
 			font-size: 30px;
 		}
 		h1{
 			font-size: 45px;
 			text-align: center;
 		}
 	</style>
 </head>
 <body>
 	<h1>活動資料</h1>
 <table border="1" id="table">
		<tr>
			<td>姓名</td>
			<td>活動資訊</td>
			<td>活動位置X軸</td>
			<td>活動位置Y軸</td>
			<td></td>
			<td></td>
		</tr>
		<?php  while($row_result=mysql_fetch_assoc($result)){
			if($_GET["id"]==$row_result["userid"])
			{
		 ?>
		
		<tr>
			<td>
				<?php echo $row_result["firstname"]; ?>
			</td>
			<td>
				<?php echo $row_result["active_title"]; ?>
			</td>
			<td>
				<?php echo $row_result["x"]; ?>
			</td>
			<td>
				<?php echo $row_result["y"]; ?>
			</td>
			<td>
				<a href="update.php?id=<?php echo $row_result["id"]; ?>">修改</a>
			</td>
			<td>
				<a href="dele.php?id=<?php echo $row_result["id"]; ?>">刪除</a>
			</td>
		</tr>
		<?php }} ?>
	</table>

 </body>
 </html>
