<style type="text/css">
td{width: 20%; border-top: 0px; border-left: 0px;}
div{display: inline-block; float: left; margin: 5px;}




</style>

<?php 
$a=10;
$b=9;
$h=$w="";
var_dump($a>$b);

if($h==""){
	
	$h=1.73;
}
if($w==""){
	
	$w=50;
}
echo "your BMI is:".$w/($h*$h)."<br>";


?> 

<div>
<h2>查詢</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
請輸入id: <input type="text" name="id"><br><br>
<input type="submit" value="查詢"><br>
</div>
<div>
<h2>新增資料</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
firstname: <input type="text" name="firstname">
<br><br>
lastname:<input type="text" name="lastname1"><br><br>
E-mail: <input type="text" name="email"><br><br>

<input type="submit" value="新增"><br>
</div>
<div>
<h2>刪除</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
id: <input type="text" name="id3"><br><br>



<input type="submit" value="刪除"><br>
</div>
<div>
<h2>修改</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
id:<input type="text" name="id2"><br><br>
firstname:<input type="text" name="firstname1"><br><br>
lastname:<input type="text" name="lastname"><br><br>
email:<input type="text" name="email1"><br><br>
<input type="submit" value="修改"><br>
</div>


<?php
$servername = "";
$username = "bojing";
$password = "bojing";
$dbname = "mysql";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
$find=$_POST["id"];

if ($_POST["id"]) {
	# code...
	$sql = "SELECT id, firstname, lastname, email FROM MyGuests WHERE id=$find";
}
else{
$sql = "SELECT id, firstname, lastname, email FROM MyGuests";

}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row


    echo "<table width=100% border=1>
		<tr>
		<td>id</td>
		<td>firstname</td>
		<td>lastname</td>
		<td>email</td>	
		</tr>	
		</table>";

    while($row = $result->fetch_assoc()) {



        echo "<table width=100% border=1>
				<tr>
				<td>$row[id]</td>
				<td>$row[firstname]</td>	
				<td>$row[lastname]</td>
				<td>$row[email]</td>
				</tr>	
				</table>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>





<?php 
$servername = "localhost";
$username = "bojing";
$password = "bojing";
$dbname = "mysql";
$id=$_POST["id3"];



// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
if ($id!=null) {
	
	$sql = "DELETE FROM MyGuests WHERE id = $id";
	

	if ($link->multi_query($sql) === TRUE) {
    echo "";
	} 
else {
    echo "Error deleting record: " . $link->error;
}
}


$link->close();
?>
<?php
$servername = "localhost";
$username = "bojing";
$password = "bojing";
$dbname = "mysql";

$nameErr = $emailErr=$lastnameErr="";

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
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $name="";
      $nameErr = "Only letters and white space allowed"; 
    }
  }
if (empty($_POST["email"])) {
	$email="";
    $emailErr = "Email is required";
  } else {
    $email =test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$email="";
      $emailErr = "Invalid email format"; 
    }
  }

   if (empty($_POST["lastname1"])) {
   	$lastname="";
    $nameErr = "lastName is required";
  } else {
    $lastname =test_input($_POST["lastname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
    		$lastname="";
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }

}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($name!=null&&$email!=null&& $lastname!=null) {
	# code...
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$name', '$lastname', '$email')";
if ($conn->multi_query($sql) === TRUE) {
    echo "新增成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

}

$conn->close();

?>

<?php
$servername = "localhost";
$username = "bojing";
$password = "bojing";
$dbname = "mysql";

$id=$_POST['id2'];





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname1"])) {
  	$firstname="";
    
  } else {
    $firstname =test_input($_POST["firstname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
    $firstname="";
       
    }
  }
if (empty($_POST["email1"])) {
	$email="";
    $emailErr = "Email is required";
  } else {
    $email =test_input($_POST["email1"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$email="";
      $emailErr = "Invalid email format"; 
    }
  }

   if (empty($_POST["lastname"])) {
   	$lastname="";
    $nameErr = "lastName is required";
  } else {
    $lastname =test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
    		$lastname="";
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }

}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($id!=null) {
	# code...
if ($firstname!=null) {
	# code...
	$sql="UPDATE MyGuests SET firstname='$firstname' WHERE id=$id";
}
if ($lastname!=null) {
	# code...
	$sql="UPDATE MyGuests SET lastname='$lastname' WHERE id=$id";
}
if ($email!=null) {
	# code...
	$sql="UPDATE MyGuests SET email='$email' WHERE id=$id";
}


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
	}
}


$conn->close();
?>














