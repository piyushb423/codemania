<?php
session_start();
?>
<?php
   $id= $_POST["id"];
   echo $id;
   include("connection.php");
   $sql="select apoint,username from answer WHERE AID = '$id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $point=$row["apoint"];
         $use=$row["username"];
    }
}
$use_login=$_SESSION['login_user'];
$conn->close();
include("connection.php");
$sql="select * from avote WHERE ID = '$id' and username='$use_login'";
 $result = $conn->query($sql);
if($result->num_rows == 0){ 
if(strcmp($use,$_SESSION['login_user'])!=0){
$point=$point-1;
}

 include("connection.php");
    
          $sql="UPDATE answer SET apoint = $point WHERE AID = '$id'";
   
   
     if($conn->query($sql)===TRUE){
          }
     else{
     echo $conn->error;
     }
 $conn->close();
   include("connection.php");
    $sql="insert into avote (ID,username) values($id,'$use_login')";
         if($conn->query($sql)===TRUE){
          }
     else{
     echo $conn->error;
     }  
 $conn->close();
  }  
          $host  = $_SERVER['HTTP_HOST'];
          $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          $extra = 'answer.php';
 
         header("Location: http://$host$uri/$extra");
?>