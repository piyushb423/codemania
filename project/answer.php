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
  background-color:	#DCDCDC;
}
a {
text-decoration : none;
}
	  

div.welcome{
  width:1000px;
  margin:0 auto;
}

div.profile{
  margin-left:165px;
  width:1000px;
  height:200px;
}

div.name{
  margin-left:50px;
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

textarea {
    display: block;
    margin-left: 155px;
}

input{
  display:block;
  margin: 0 auto;
}

p.ans{
  margin-left:700px;
  font-size:140%;
}
p.ask{
  font-style:italic;
  margin-left:700px;
  font-size:140%;
}
p.answer{
  margin-left:100px;
  font-size:150%;
}
input[type="text"]{
border : none;
background-color : #DCDCDC

}
div.area{
  margin-left:18px;
}
div.vote{
width: 50px;
float : left;
}
h3{
font:italic;
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
$ans = $uaname="";
$apoint=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $qid=$_POST["id"];
    $ans = $_POST["ans"];
    $uaname= $_SESSION['login_user'];
    $ans=str_replace("'","",$ans);
    if(strlen($ans)!=0){
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

    $sql = "INSERT INTO answer (answer,username,apoint,ID) VALUES ('$ans','$uaname','$apoint','$qid')" ;

    if ($conn->query($sql) === TRUE) {
      //echo "<h2>Registration Successful</h2><br><br><br>";
    } 
    else {
      echo "<br>" . $conn->error;
      //echo "<h2>Already Registered Username</h2><br><br><br>";
    }
    $conn->close();
    }
}
else
{
$_POST["id"]=$_SESSION['qid'];
}
?>
<?php
include("rank.php");
?>
<div class="profile">
<img src="index.jpeg" max-width=500px max-height=150px style="float:left">
<div  class="name">
<p><br><br><br></p>
<label style="font-size:20px ; margin-left:150px " >Username:</label>&nbsp&nbsp&nbsp<font size='5pt'><?php echo $usname ;?></font><br><br>
<label style="font-size:20px ; margin-left:150px ">Karma Point:</label>&nbsp&nbsp<font size='5pt'><?php echo $kpoint;?></font><br><br>
<label style="font-size:20px ; margin-left:150px ">Rank:</label>&nbsp&nbsp<font size='5pt'><?php echo $f;?></font><br><br>
</div>
<p><br><br></p>
<a href="http://localhost/project/main.php"><img src="pic.png"  width=100px height=100px style="margin-left:100px"></a>
</div>
<div class="welcome"><br>
<h1>Welcome</h1>
<?php
  include("connection.php");
  $qid=$_POST["id"];
  $_SESSION['qid']=$qid;

  $sql2="select username,question from question where ID='$qid'";
  $result1 = $conn->query($sql2);
  if ($result1->num_rows > 0 ) {
    while($row = $result1->fetch_assoc()) {
      $que=$row["question"];
      $upname=$row["username"];
      echo "<h3 align='justify'>"."Que.".$que."</h3>";
      echo '<p class="ask">'."Asked by->".$upname."</p>";
   }
  }
$conn->close(); 
  include("connection.php");
  $sql3="select username,AID,apoint,answer from answer where ID='$qid'";
  $result = $conn->query($sql3);
  if($result->num_rows > 0 ) {
    while($row = $result->fetch_assoc()) {

      $ans=$row["answer"];
      $point=$row["apoint"];
      $usename=$row["username"];
      $id=$row["AID"];
      echo '<div class=vote>';
      echo '<form method="post" action="ans_up.php">';
      echo '<input type="hidden" name="id" ';echo "value='$id'>";
      echo '<input name="upvote" type="image" src="up.png" width=20px height=30px style="margin-left:0px" id="rateup">';
    
      echo '</form>';
      echo $point;       
      echo '<form method="post" action="ans_down.php">';
      echo '<input type="hidden" name="id" ';echo "value='$id'>";
      echo '<input name="downvote" type="image" src="down.png" width=20px height=30px  style="margin-left:0px" id="ratedown">';
        
      echo '</form>';
      echo '</div>';
      echo "<p class='answer' align='justify'>"."Ans.".$ans."</p>";
      echo '<p class="ans">'."Answered by->".$usename."</p>";
     //echo '<input type="submit" value="View Answer" style="font-size:15px; float:left"><br>';
     
    }  
  }
else{
echo $conn->error;
}
$conn->close(); 
?>
</div>
<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class='area'>
<textarea name="ans" placeholder="Write Your Answer..." style="font-family:sans-serif;font-size:1.2em;" rows="3" cols="98" >
</textarea><br>
</div>
<?php echo '<input type="hidden" name="id" ';echo "value='$qid'>";?>

<input type="submit" value="Submit" style="font-size:20px">
</form>
</body>
</html>
