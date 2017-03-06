<?php
include("connection.php");
$sql2 = "DELETE FROM user where karmapoint<-4 ";
if ($conn->query($sql2) === TRUE){
} else {
    echo  $conn->error;
}
$sql2 = "DELETE FROM question where qpoint<-2 ";
if ($conn->query($sql2) === TRUE){  
} 
else {
    echo  $conn->error;
}
$sql2 = "DELETE FROM answer where apoint<-2 ";
if ($conn->query($sql2) === TRUE){
} 
else {
    echo  $conn->error;
}
?>
