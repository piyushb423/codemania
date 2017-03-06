<?php
include("connection.php");
$sql='select * from user order by karmapoint desc';
$result=$conn->query($sql);
$user=$_SESSION['login_user'];
$f=1;
if ($result->num_rows > 0 ) {
    while($row = $result->fetch_assoc()) {
      if($user==$row['username']){
        break;
    }
      else{
      $f=$f+1;
    }
  }
}
$conn->close();
?>