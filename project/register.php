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




table td{
padding-top: 10px;
}

div.button{
margin: 0 auto;
margin-top: 20px;
}
</style>
</head>
<body>
<?php
$nameErr = $usernameErr= $emailErr = $genderErr = $passwordErr = $confirmpasswordErr="";
$name = $username= $email = $gender = $password = $confirmpassword = $college = "";
$f=0;
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
    
  if (empty($_POST["username"])) {
     $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    
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
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
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

<h1 align=center><marquee behavior=scroll scrollamount="10" direction="left">CODEMANIA DISCUSSION</marquee></h1>
<!--<a href="http://localhost/project/home.php"><img src="pic.png" width=200px height=100px></a>-->
<a  href="http://localhost/project/home.php" style="font-size:20px">Home</i></a>
<div class="Reg">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

 <fieldset>
  <legend style="font-size:30px">Sign Up:</legend>
  <p><span class="error">* required field.</span></p>
  <table style="width:100%">
<tr>
  <td><label style="font-size:20px">Name :</label></td>
  <td><input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>
  <td><label style="font-size:20px">Email :</label></td>
  <td><input type="email" name="email">
  <span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
  <td><label style="font-size:20px">Username :</label></td>
  <td><input type="text" name="username">
  <span class="error">* <?php echo $usernameErr;?></span></td>
</tr>
<tr>
  <td><label style="font-size:20px">Password :</label></td>
  <td><input type="password" name="pass">
  <span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
  <td><label style="font-size:20px">Confirm password:</label></td>
  <td><input type="password" name="cpass">
  <span class="error">* <?php echo $confirmpasswordErr;?></span></td>
</tr>
<tr>
  <td><label style="font-size:20px">College :</label></td>
  <td><input type="text" name="college">
  <span class="error"><?php echo " ";?></span></td>
</tr>

<tr>
  <td><label style="font-size:20px">Gender :</label></td>
  <td>  <input type="radio" name="gender"  value="female">Female
  <input type="radio" name="gender"  value="male">Male
  <span class="error">* <?php echo $genderErr;?></span></td>
</tr>

<div class="button">
<tr>
 <td></td>
  <td><input class="myButton" type="submit" value="Sign up" style="font-size:20px">&nbsp&nbsp
   <a class="myButton" href="http://localhost/project/login.php" style="font-size:15px">Login</a></td>
</tr>
   
</table>
</div>

 </fieldset>
</form>
</div>
<br><br>
<?php
if($f==6){
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

$sql = "INSERT INTO user VALUES ('$name','$email','$username','$password','$college','$gender',0)";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Registration Successful</h2><br><br><br>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<h2>Already Registered Username</h2><br><br><br>";
}
$conn->close();
}
else
{
}
?>



</body>
</html>
