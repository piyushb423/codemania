<?php
  session_start();
 if(!isset($_SESSION['login_user'])) {
    $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'home.php';
  header("Location: http://$host$uri/$extra");
}
?>
<!DOCTYPE html>
<html>
<title>My Profile</title>
<head>
<style>
body{
    background-image: url('background_signup.jpg');
}
div.profile{
  
  width:500px;
  margin : 0 auto;
        font-size: 12px;
        font-weight: bold;
        line-height: 15.12px;
        text-rendering: optimizeLegibility;
        text-shadow: grey 0px 1px 2px;
        zoom: 1;

 
}
div.button{
  float:left;
  margin-left:50px;
  margin-top:114px;
  
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
padding-bottom : 10px;
}

</style>
</head>
<body>
<?php
  $name=$upname=$karmapoint=$college="";
  $upname = $_SESSION['login_user'];
  include("connection.php");
  $sql3="select name,karmapoint,email,college from user where username='$upname'";
  $result = $conn->query($sql3);
  
  if ($result->num_rows > 0 ) {
    
    while($row = $result->fetch_assoc()) {
       
       $name=$row["name"] ;
       $karmapoint=$row["karmapoint"]; 
       $college=$row["college"];    
       $email=$row["email"];
    }
} 
?>
<a href="http://localhost/project/main.php"><img src="pic.png" width=100px height=80px></a>
<!--<img src="index.jpeg" max-width=300px max-height=100px style="float:left ; margin-top:100px ">-->
<div class="profile">
<fieldset>
<table style="width:100%">
<legend style="font-size:30px">My Profile:</legend>
<tr>
<td><label style="font-size:20px">Username:</label></td><td><font size='5pt'><?php echo $upname ;?></font></td>
</tr>
<tr>
<td><label style="font-size:20px">Name:</label></td><td><font size='5pt'><?php echo $name ;?></font></td>
</tr>
<tr>
<td><label style="font-size:20px">Email:</label></td><td><font size='4pt'><?php echo $email ;?></font></td>
</tr>
<tr>
<td><label style="font-size:20px">Karma Point:</label></td><td><font size='5pt'><?php echo $karmapoint;?></font></td>
</tr>
<tr>
<td><label style="font-size:20px">College:</label></td><td><font size='5pt'><?php echo $college ;?></font></td>
</tr>
</table>
<div style="float: left; width: 150px"> 
<form action="http://localhost/project/editprofile.php" method="post">
    <input class="myButton" type="submit" value="EditProfile" >
</form>
</div>
<div style="float: left; width: 150px"> 
    <form action="http://localhost/project/logout.php" method="post">
     <input  class="myButton" type="submit" value="Logout" >
    </form>
</div>
</fieldset>
</div>

</body>
</html>
