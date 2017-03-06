
<?php
     session_start();
   
?>
<!DoCTYPE html>
<html>
<title>Login</title>
<head>
<style>
body{
    background-image: url('background_signup.jpg');
}
	



h1{
color: #800000;
}
h2{
color:red;
text-align: center;
 }

div.login {
max-width: 500px;
margin: 0 auto;
margin-top : 100px;
font-size: 12px;
        font-weight: bold;
        line-height: 15.12px;
        text-rendering: optimizeLegibility;
        text-shadow: grey 0px 1px 2px;
        zoom: 1;

}
div.button{
margin: 0 auto;
margin-top: 20px;
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
padding-top : 10px;
}


</style>
</head>
<body>

<?php
  
$error=0;
if($_SERVER["REQUEST_METHOD"] == "POST") {

   
       include("connection.php");
      // username and password sent from form 
      
      $myusername = $conn->real_escape_string($_POST["username"]);
      $mypassword = $conn->real_escape_string($_POST["pass"]); 
      
      $sql = "SELECT username FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
     /* $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];*/
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      //echo $result->num_rows;
      if ($result->num_rows == 1) {
         
          $_SESSION['login_user'] = $myusername;
          $host  = $_SERVER['HTTP_HOST'];
          $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          $extra = 'main.php';
          header("Location: http://$host$uri/$extra");
         
         
         //header("loaction: http://localhost/project/home.php");
          exit();
      }else {
         $error = 1; 
      }
      $conn->close();
   }
   ?>

<h1 align=center><marquee behavior=scroll scrollamount="10" direction="left">CODEMANIA DISCUSSION</marquee></h1>

<a  href="http://localhost/project/home.php" style="font-size:20px">Home</i></a>
<div class="login">
<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
 <fieldset>
  <legend style="font-size:30px">Login:</legend>
  <table style="width:100%">
<tr>
  <td><label style="font-size:20px">Username:</label></td> 
  <td><input type="text" name="username"></td>
</tr>
<tr>
  <td><label style="font-size:20px">Password:</label></td>
  <td><input type="password" name="pass"></td>
</tr>

<div class="button">
<tr>
 <td></td>
  <td><input class="myButton" type="submit" value="Login" style="font-size:20px">&nbsp&nbsp
   <a class="myButton" href="http://localhost/project/register.php" style="font-size:15px">Sign up</a></td>
</tr>
</table> 
</div>
 </fieldset>
</form>
</div>
<?php
if($error==1){
$message = "Username or Password is invalid";
echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
</body>
</html>
