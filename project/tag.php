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
<!DOCTYPE HTML>
<html>
<title>Codemania Discussion</title>
<head>
<style>
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
body{
  background-color:#DCDCDC;
}

div.login {
max-width: 500px;
margin: 0 auto;
background-color : #DCDCDC;
margin-top:50px;
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id=$_POST["id"];
   
    $username = $_POST["user"];
    if(strlen($username)>0){
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
    $sql1="select * from user where username='$username'";
     $result=$conn->query($sql1);
    if($result){
     if($result->num_rows>0){
        $sql2="insert into tag values($id,'$username')";
        if ($conn->query($sql2) === TRUE) {
          $host  = $_SERVER['HTTP_HOST'];
          $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          // $extra = 'btree.php';
          $extra=$_SESSION['TOPIC'];
          header("Location: http://$host$uri/$extra");
        } 
        else {
          $host  = $_SERVER['HTTP_HOST'];
          $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          // $extra = 'btree.php';
          $extra=$_SESSION['TOPIC'];
          header("Location: http://$host$uri/$extra");
        }
        
     }
     else{
      $message = "User name does not exist";
      echo "<script type='text/javascript'>alert('$message');</script>";
     
     }
     }
     else{}
    $conn->close();
    }
    else
    {
    }
}

?>

<div class="profile">
<img src="index.jpeg" max-width=500px max-height=150px style="float:left">
<div  class="name">
<p><br><br><br></p>
<label style="font-size:20px ; margin-left:150px " >Username:</label>&nbsp&nbsp&nbsp<font size='5pt'><?php echo $usname ;?></font><br><br>
<label style="font-size:20px ; margin-left:150px ">Karma Point:</label>&nbsp&nbsp<font size='5pt'><?php echo $kpoint;?></font><br><br>
</div>
<p><br><br></p>
<a href="http://localhost/project/main.php"><img src="pic.png"  width=100px height=100px style="margin-left:100px"></a>
</div>

<div class="login">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
<legend style="font-size:20px">Person</legend>
<label style="font-size:20px">Username:&nbsp</label><input type="txt" name="user"><br><?php 
echo '<input type="hidden" name="id" ';echo "value='$id'>";
?>
<input type="submit" value="Submit" style="font-size:15px">
</fieldset>

</form>
</div>

</body>
</html>
