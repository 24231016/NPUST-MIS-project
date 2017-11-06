<?php 
header("Content-Type: text/html; charset=utf-8");
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "myapp";
mysql_query("SET NAMES 'utf8'");
$nameErr = $xErr=$active_titleErr=$yErr="";
$userid=$_GET['id'];

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
  	$name="";
    $nameErr = "firstName is required";
  } else {
    $name =test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    
  }
if (empty($_POST["y"])) {
	$y="";
    $yErr = "Email is required";
  } else {
    $y =test_input($_POST["y"]);
    // check if e-mail address is well-formed
    
  }

   if (empty($_POST["active_title"])) {
   	$active_title="";
    $active_titleErr = "active_title is required";
  } else {
    $active_title =test_input($_POST["active_title"]);
    // check if name only contains letters and whitespace
   
  }


  if (empty($_POST["x"])) {
    $x="";
    $xErr = "active_title is required";
  } else {
    $x=test_input($_POST["x"]);
    // check if name only contains letters and whitespace
    
  }

    if (empty($_POST["active_context"])) {
    $active_context="";
    //$active_context = "$active_context is required";
  } else {
    $active_context=test_input($_POST["active_context"]);
    // check if name only contains letters and whitespace
    
  }

    if (empty($_POST["record"])) {
    $record="";
    //$active_context = "$active_context is required";
  } else {
    $record=test_input($_POST["record"]);
    // check if name only contains letters and whitespace
    
  }

   if (empty($_POST["settime"])) {
    $settime="";
    //$active_context = "$active_context is required";
  } else {
    $settime=test_input($_POST["settime"]);
    // check if name only contains letters and whitespace
    
  }

}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($name!=null&&$x!=null&& $active_title!=null&&$y!=null) {
	# code...
$sql = "INSERT INTO myguests (firstname, active_title,active_context,x,y,userid,record,settime)
VALUES ('$name', '$active_title', '$active_context', '$x','$y','$userid','$record','$settime')";
if ($conn->multi_query($sql) === TRUE) {
    echo "新增成功";
    header("Location:addSuccess.php?id=$_GET[id]");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

}

$conn->close();

?>





 
<!DOCTYPE html>
<html>
<head>
	     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title></title>
	<style type="text/css">
		#div{margin:auto 0px; text-align: center; margin-top:50px; }

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
h2{
	font-size: 60px;
}
h1{
text-align: left;
}
textarea {
    width: 100%;
    height: 800px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    font-size: 40px;
    width: 100%;
}
	</style>
</head>
<body>
<div id="div">
<h2>新增活動</h2>
<form action="" method="POST">
<h1>姓名:</h1> <p><input type="text" name="firstname"></p>
<br>
<h1>活動名稱:</h1><p><input type="text" name="active_title"></p>
<br>
<textarea rows="4" cols="50" name="active_context" placeholder="活動內容....">
</textarea>
<p><input type="hidden" name="x" value="12"></p>
<p><input type="hidden" name="y" value="12"></p>
<input type="hidden" name="userid" value="<?php echo $_GET["id"] ?>">
<input type="hidden" name="record"  value="<?php $datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ; 
echo $datetime ;　　　 // 顯示時間 
 ?>">
 活動時間:<p> <input type="date" name="settime"></p>
<br><br><br><br>
<input type="submit" value="新增"><br>
</div>
</body>
</html>