<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
$sql_query = "SELECT * FROM `myguests`";
  $result= mysql_query($sql_query);
$result1= mysql_query($sql_query);
$a=$_POST["active_title"];

 ?>







<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#a{margin: 0px auto; text-align: center;}
		#div{margin: 0px auto; text-align: center;}	
		#table{margin: 0px auto; text-align: center;}


	</style>
</head>
<body>
<a href="add.php" id="a">新增</a>
<br/><br/><br/>

		<div id="div">
	<h2>查詢</h2>
	
	<form name="form1" id="form1" method="post" action="data.php">
	活動名稱: <input type="text" id="active_title" name="active_title"><br><br>
	<input type="submit" name="button" id="button" value="查詢"><br>
</form>
	</div>
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
			if($a==$row_result["active_title"])
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


		<?php  while($row_result=mysql_fetch_assoc($result1)){
		 
		 	if($a==null){
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