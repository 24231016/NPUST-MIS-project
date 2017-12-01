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

  $sql_query = "SELECT * FROM `activity`";
  $result = mysql_query($sql_query);
  while($row_result=mysql_fetch_assoc($result))
    {
    	if($_GET["lat"]==$row_result["latitude"]&&$_GET["lng"]==$row_result["longitude"])
    	{
        $activitytitle=$row_result["activity_title"];
    		$id=$row_result["id"];
    	}
    }

  $sqlvisit = "SELECT * FROM `visit`";
  $resultvisit = mysql_query($sqlvisit);
    while($row_result=mysql_fetch_assoc($resultvisit))
    {
      if($id==$row_result["activity_id"]){
        if($_GET["mid"]==$row_result["userid"])
        {
          $visit="ture";
        }
      }
    }  

  $sqlplatform = "SELECT * FROM `platform`";
  $resultplatform = mysql_query($sqlplatform);


////新增留言  
if(isset($_POST["action"])&&($_POST["action"]=="add")){
  $query_insert = "INSERT INTO `platform` (`name`,`userid`,`context`,`activity_id`) VALUES (";
  $query_insert .= "'".$_POST["name"]."',";
  $query_insert .= "'".$_POST["userid"]."',";
  $query_insert .= "'".$_POST["context"]."',";
  $query_insert .= "'".$_POST["activity_id"]."')";
  mysql_query($query_insert);
  //重新導向回到主畫面
  header("Location: activity-platform.php?mid=$_GET[mid]&lat=$_GET[lat]&lng=$_GET[lng]");
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
table{
  text-align: center;
  font-size: 50px;
}
h1{
  font-size: 100px;
}
.wi{
  width: 100%;
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
input[type=text] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    outline: none;
}
input[type=submit] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    width: 9%;
}
  </style>
</head>
<body>
  <input class="wi" type=button value="回選揪團" onclick="location.href='map.php?mid=<?php echo $_GET["mid"]; ?>'">
  <div style="text-align: center">
    <h1><?php echo $activitytitle; ?></h1>
    <br/><br/><br/><br/><br/>
    <hr>
    <table width="100%">
      <tr>
        <td width="50%">姓名</td>
        <td width="50%">內容</td>
      </tr>
    </table>
    <hr>
    <br/>
	<?php while($row_result=mysql_fetch_assoc($resultplatform))
    { if($id==$row_result["activity_id"]){ ?>
      <table width="100%">
        <tr>
          <td width="50%"><?php echo $row_result["name"]; ?></td>
          <td width="50%"><?php echo $row_result["context"]; ?></td>
        </tr>
      </table>
      <hr>
      <br/>
  <?php }} ?>
  </div>
  <?php if($visit=="ture"){ ?>
  <br/><br/><br/>
  <div style="width:100%; position:fixed; left:0; bottom:0;background-color: black;">
  <form action="" method="post" name="formAdd" id="formAdd">  
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <input type="hidden" name="userid" value="<?php echo $_GET["mid"] ?>">
  <input type="text" name="context">
  <input type="hidden" name="activity_id" value="<?php echo $id; ?>">
  <input name="action" type="hidden" value="add">
  <input type="submit" class="button" name="" value="確認">   
  </form> 
  </div>
  <?php } ?>
</body>
</html>