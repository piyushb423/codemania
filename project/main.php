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
<title>Codemania Discussion</title>
<head>
<style>
body{
  background-color:    #DCDCDC;
}
a {
text-decoration : none;
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
  width:750px;
  float:left;
  margin-left:40px;
  margin-right:40px;
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
    padding: 20px 30px;
    text-decoration: none;
}

div.profile{
  margin-left:165px;
  width:1000px;
  height:200px;
}
div.name{
  margin-left:0px;
  width:400px;
  height:200px;
  float:left;

font-size: 20px;
        font-weight: bold;
        line-height: 15.12px;
        text-rendering: optimizeLegibility;
        text-shadow: grey 0px 1px 2px;
        zoom: 1;

}

div.user a{
padding : 10px;
color: white;
background-color: black;
}
div.user a:hover{
background-color: red;
}

textarea {
    display: block;
    margin-left: 355px;
}
input{
  display:block;
  margin: 0 auto;
}
p.ask{
  margin-left:500px;
  font-size:140%;
}
input[type="text"]{
border : none;
background-color : #DCDCDC

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

div.vote{
width: 50px;
float : left;
}
div.fix {
    position: fixed;
    top: 20px;
    right: 0;
    width: 180px;
}
.topright {
    position: absolute;
    top: -25px;
    right: 80px;
    font-size: 18px;
}
div.div{
  width:375px;
  float:left;
}
div.tag{
  width: 375px;
  float:left;
}
</style>
</head>
<body>
<?php
  $usname=$kpoint="";
  $usname= $_SESSION['login_user'];
  include("connection.php");
  
  $sql3="select karmapoint from user where username='$usname'";
  
  $result = $conn->query($sql3);
  
  if ($result->num_rows > 0 ) {
    
    while($row = $result->fetch_assoc()) {
       $kpoint=$row["karmapoint"];
    }
  }
  $conn->close();
?>
<?php
include("rank.php");
$_SESSION['TOPIC']="main.php";
?>
<div class="profile">
<img src="index.jpeg" max-width=500px max-height=150px style="float:left">
<div  class="name">
<p><br><br><br></p>
<label style="font-size:20px ; margin-left:150px " >Username:</label>&nbsp&nbsp&nbsp<font size='5pt'><?php echo $usname ;?></font><br><br>
<label style="font-size:20px ; margin-left:150px ">Karma Point:</label>&nbsp&nbsp<font size='5pt'><?php echo $kpoint;?></font><br><br>
<label style="font-size:20px ; margin-left:150px ">Rank:</label>&nbsp&nbsp<font size='5pt'><?php echo $f;?></font><br><br>
</div>
</div>
<div  class="main">
<ul class="horizontal">
  <li><a href="http://localhost/project/main.php">Home</a></li>
  <li><a href="http://localhost/project/profile.php">Profile</a></li>
  <li><a href="http://localhost/project/editprofile.php">EditProfile</a></li>
  <li><a href="http://localhost/project/yourans.php">Your Answers</a></li>
  <li><a href="http://localhost/project/rated.php">Top Questions</a></li>
  <li><a href="http://localhost/project/ranklist.php">Ranklist</a></li>
  <li><a href="http://localhost/project/logout.php">Logout</a></li>
</ul>
<div class="topic">
<ul>
  <li class="dropdown">
    <a href="#" class="dropbtn">Datastructure</a>
    <div class="dropdown-content">
      <a href="http://localhost/project/array.php">Array</a>
      <a href="http://localhost/project/linklist.php">Linklist</a>
      <a href="http://localhost/project/stack.php">Stack</a>
      <a href="http://localhost/project/queue.php">Queue</a>
      <a href="http://localhost/project/btree.php">Binarytree</a>
      <a href="http://localhost/project/graph.php">Graph</a>
    </div>
 <li class="dropdown">
    <a href="#" class="dropbtn">Algorithms</a>
    <div class="dropdown-content">
      <a href="http://localhost/project/dp.php">Dyanamic Programming</a>
      <a href="http://localhost/project/greedy.php">Greedy Algorithms</a>
      <a href="http://localhost/project/bit.php">Bit Algorithms</a>
    </div>
  <li class="dropdown">
    <a href="http://localhost/project/c.php" class="dropbtn">C</a>
   </li>
  <li class="dropdown">
    <a href="http://localhost/project/c++.php" class="dropbtn">C++</a>
   </li>
  <li class="dropdown">
    <a href="http://localhost/project/java.php" class="dropbtn">java</a>
   </li>
  <li class="dropdown">
    <a href="http://localhost/project/python.php" class="dropbtn">python</a>
   </li>
  <li class="dropdown">
    <a href="http://localhost/project/android.php" class="dropbtn">Android</a>
   </li>
</ul>


</div>

<div class="welcome"><br>
<?php
  include("connection.php");
  
  $sql3="select question,ID from question where username='$usname'";
  
  $result = $conn->query($sql3);
  
  if ($result->num_rows > 0 ) {
    echo '<h1> Your Questions</h1>';
    while($row = $result->fetch_assoc()) {
       
       $ques=$row["question"] ;
        echo "<h3 align='justify'>"."Que.".$ques."</h3>";
        $id=$row['ID'];
        echo '<div class="div">';
        echo '<form method="post" action="answer.php">';
        echo '<input type="hidden" name="id" ';echo "value='$id'>";
        echo '<input type="hidden" name="ans" ';echo "value=''>";
        echo'<input class="myButton" type="submit" style="font-size:10px" value="View Answer" >';
        echo '</form>';
        echo '</div>';
        
      echo '<div class="tag">';
      echo '<form method="post" action="tag.php">';
      echo '<input type="hidden" name="id" ';echo "value='$id'>";
      echo '<input type="hidden" name="user" ';echo "value=''>";
      echo'<input class="myButton" type="submit" style="font-size:10px"value="Tag" >';
      echo '</form>';
      echo '</div><br>';
        
        
        
        echo '<hr>';
        
        
    
    
    }
  }
  
  $sql="select ID from tag where username='$usname'";
  $result = $conn->query($sql);
  $cnt=$result->num_rows;
?>
</div>
</div>
<div class='fix'>
  <a href='http://localhost/project/notification.php'><abbr title="Notification"><img src='not.png' width='100px' height='100px '></abbr></a>
  <div class="topright"><h2 style="color:green"><?php echo $cnt;?> </h2></div>
</div>
</body>
</html>
