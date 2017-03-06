<?php
session_start();
include("karma.php");
if(!isset($_SESSION['login_user'])) {
    $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'home.php';
  header("Location: http://$host$uri/$extra");
}
?>
<!DoCTYPE html>
<html>
<title>Register</title>
<head>
<style>
body{
    background-image: url('background_signup.jpg');
}
.error{
  color: red;
}
a{


padding: 3px;
text-decoration: none;

}
h1{
color: #800000;

}
h2{
  text-align :center;
  margin : 0 auto ;
  color: black;
}

div.Reg {
font-size: 12px;
        font-weight: bold;
        line-height: 15.12px;
        text-rendering: optimizeLegibility;
        text-shadow: grey 0px 1px 2px;
        zoom: 1;
max-width: 700px;
max-height : 800px;
margin: 0 auto;

}
table td{
padding-top: 10px;
}
.myButton {
	-moz-box-shadow: 3px 4px 0px 0px #276873;
	-webkit-box-shadow: 3px 4px 0px 0px #276873;
	box-shadow: 3px 4px 0px 0px #276873;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
	background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
	background-color:#599bb3;
	-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border-radius:15px;
	border:1px solid #29668f;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:7px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
	background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
	background-color:#408c99;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
</head>
<body>
<?php
$nameErr =  $emailErr = $passwordErr = $myname= $confirmpasswordErr="";
$name = $email = $password = $confirmpassword = $college = "";
$f=0;
$myname = $_SESSION['login_user'];
include("connection.php");
$sql3= "select name,college,email from user where username='$myname'";
$result=$conn->query($sql3);
if($result-> num_rows >0){
  while($row = $result -> fetch_assoc()){
    $nm=$row['name'];
    $mail=$row['email'];
    $clg=$row['college'];
  }
}
$conn->close();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      }
     else
     $f+=1;
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    else
    $f+=1;
  }


  if (empty($_POST["pass"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["pass"]);
    if(strlen($password)<6)
     $passwordErr = "Minimum 6 char required";
    else 
     $f+=1;
  }
  if (empty($_POST["cpass"])) {
    $confirmpasswordErr = "Confirm Password is required";
  } else {
    $confirmpassword = test_input($_POST["cpass"]);
    if(strcmp($confirmpassword,$password)!=0)
     $confirmpasswordErr = "Password not matched";
    else 
     $f+=1;
  }
 
  if (empty($_POST["college"])) {
    $college = "";
  } else {
    $college = test_input($_POST["college"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<a href="http://localhost/project/main.php"><img src="pic.png" width=100px height=80px></a>

<div class="Reg">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

 <fieldset>
  <legend style="font-size:30px">Edit Profile:</legend>
  <table style="width:100%">
  <tr>
  <td><label style="font-size:20px">Name :</label></td><td><input type="text" <?php echo "value='$nm'";?> name="name"></td>
  <td><span class="error"><?php echo $nameErr;?></span></td>
  </tr>
  <tr>
  <td><label style="font-size:20px">Email :</label></td> <td><input type="email" <?php echo "value='$mail'";?> name="email"></td>
  <td><span class="error"> <?php echo $emailErr;?></span></td>
  </tr>
  <tr>
  <td><label style="font-size:20px">Password :</label></td><td><input type="password" name="pass"></td>
  <td><span class="error"> <?php echo $passwordErr;?></span></td>
  </tr>
  <tr>
  <td><label style="font-size:20px">Confirm<br>Password :</label></td><td><input type="password"  name="cpass"></td>
  <td><span class="error"> <?php echo $confirmpasswordErr;?></span></td>
  </tr>
  <tr>
  <td><label style="font-size:20px">College :</label></td><td><input type="text" <?php echo "value='$clg'";?> name="college"></td>
  <td></td>
  
  </table>
  
  <input class="myButton" type="submit" value="Update" style="font-size:15px">

 </fieldset>
</form>
</div>
<br><br>
<?php
if($f==4){

$servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $uname, $pword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

     
$sql1="update user set name='$name', password='$password',email='$email',college='$college' where username='$myname'" ;

if ($conn->query($sql1) === TRUE) {
    sleep(1);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'profile.php';
    header("Location: http://$host$uri/$extra");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<h2>Sorry</h2><br><br><br>";
}
$conn->close();
}
else
{
}
?>



</body>
</html>
