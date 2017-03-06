<?php
session_start();
?>
<?php
   $id= $_POST["id"]; 
   echo $id;
  include("connection.php");
  $sql="select qpoint,username from question WHERE ID = '$id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $point=$row["qpoint"];
         $use=$row["username"];  
    }
}
$use_login=$_SESSION['login_user'];
$sql="select * from qvote WHERE ID = '$id' and username='$use_login'";
 $result = $conn->query($sql);
if($result->num_rows == 0){ 
if(strcmp($use,$_SESSION['login_user'])!=0){
$point=$point+1;
}
    
          $sql="UPDATE question SET qpoint = $point WHERE ID = '$id'";
   
   
     if($conn->query($sql)===TRUE){
          }
     else{
     echo $conn->error;
     }
    $sql="insert into qvote (ID,username) values($id,'$use_login')";
         if($conn->query($sql)===TRUE){
          }
     else{
     echo $conn->error;
     }  
  }
  $extra=$_SESSION['TOPIC'];  
          $host  = $_SERVER['HTTP_HOST'];
          $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          //$extra = 'btree.php';
 
         header("Location: http://$host$uri/$extra");
          $conn->close();
?>