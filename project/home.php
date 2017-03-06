<?php
include("karma.php");
include("delete.php")
?>
<!DoCTYPE html>
<html>
<title>Codemania Discussion</title>
<head>
<style>
body{
  background-color:	#DCDCDC;
}
	  
div.main{
  
  width:1000px;
  margin:0 auto;

        }

div.topic{
  margin-top:40px;
  width:150px;
  float:left;
}
div.welcome{
  width:600px;
  float:left;
  margin-left:40px;
  margin-right:40px;
  overflow:auto;
  
}
div.karma{
 margin-top:40px;
  float:left;
  width:150px;
  border:3px solid black;

}
div.topic ul { 
    width : 150px;
    list-style-type: none;
    margin: 0px ;
    padding: 0;
    overflow: hidden;
    background-color: black;   
    
}
div.topic li a {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 10px;
    text-decoration: none;
}
li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: black;
    min-width: 160px;
    margin-left:100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: red;}

.dropdown:hover .dropdown-content {
    display: block;
}

ul.horizontal li {
    float: left;
}

ul.horizontal{
    width : 1000px;
    list-style-type: none;
    margin: 0 auto ;
    padding: 0;
    overflow: hidden;
    background-color: black;
}
ul.horizontal li a {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 40px;
    text-decoration: none;
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
	font-size:10px;
	padding:5px 15px;
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
<center><img src="index.jpeg" max-width=500px max-height=150px></center>
<div  class="main">
<ul class="horizontal">
  <li><a href="http://localhost/project/home.php">Home</a></li>
  <li><a href="http://localhost/project/about.php">About</a></li>
  <li><a href="http://localhost/project/login.php">Login</a></li>
  <li><a href="http://localhost/project/register.php">Sign up</a></li>
  <li><a href="http://localhost/project/contact.php">Contact</a></li>
</ul>


<div class="topic">
<ul>
  <li class="dropdown">
    <a href="#" class="dropbtn">Datastructure</a>
    <div class="dropdown-content">
      <a href="#" onClick="alert('Login Required')">Array</a>
      <a href="#" onClick="alert('Login Required')">Linklist</a>
      <a href="#" onClick="alert('Login Required')">Stack</a>
      <a href="#" onClick="alert('Login Required')">Queue</a>
      <a href="#" onClick="alert('Login Required')">Binarytree</a>
      <a href="#" onClick="alert('Login Required')">Graph</a>
    </div>
 <li class="dropdown">
    <a href="#" class="dropbtn">Algorithms</a>
    <div class="dropdown-content">
      <a href="#" onClick="alert('Login Required')">Dyanamic Programming</a>
      <a href="#" onClick="alert('Login Required')">Greedy Algorithms</a>
      <a href="#" onClick="alert('Login Required')">Bit Algorithms</a>
    </div>
  <li class="dropdown">
    <a href="#" onClick="alert('Login Required')" class="dropbtn">C</a>
   </li>
  <li class="dropdown">
    <a href="#" onClick="alert('Login Required')" class="dropbtn">C++</a>
   </li>
  <li class="dropdown">
    <a href="#" onClick="alert('Login Required')" class="dropbtn">java</a>
   </li>
  <li class="dropdown">
    <a href="#" onClick="alert('Login Required')" class="dropbtn">python</a>
   </li>
  <li class="dropdown">
    <a href="#" onClick="alert('Login Required')" class="dropbtn">Android</a>
   </li>
</ul>

</div>

<div class="welcome"><br>
<h1>Welcome</h1>
<h3 style="color:red"><marquee behavior=scroll scrollamount="8" direction="left">top 10 rated question</marquee></h3>
<?php
  $f=1;
  include("connection.php");
  $sql = "select question from question order by qpoint desc";
  $result=$conn->query($sql);
  if($result->num_rows > 0){
  while(($row=$result->fetch_assoc()) && $f<=10){
  $que=$row["question"];
  echo "<h3 align='justify'>que ". $f .". " .  $que ."</h3> <br>" ;
  $f+=1;
      echo '<form>';
      echo'<input type="button" class="myButton"value="View Answer"  onClick="alert ';echo "('Login Required')";echo '"';echo '>';
      echo '</form>';
      echo "<hr>";
  }
}
?>

</div>

<div class="karma">
<h4 style="color:red"><marquee behavior=scroll scrollamount="5" direction="left">top 10 user</marquee></h4>
<?php
include("connection.php");
$sql = "select karmapoint,username from user order by karmapoint desc";
$result = $conn->query($sql);
$f=1;
  if ($result->num_rows > 0 ) {
    while(($row = $result->fetch_assoc())&&($f<=10)){
      $name=$row["username"];
      echo "<hr>";
      echo "<p>".'<b>'.$f.".  ".$name.'</b>'."</p>";
      $f+=1; 
  }
}
?>
</div>
</div>
</body>
</html>