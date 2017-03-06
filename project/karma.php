<?php
include("connection.php");
$sqlx="select username from user";
$resultx=$conn->query($sqlx);
if($resultx->num_rows>0){
while($row=$resultx->fetch_assoc()){
$user=$row["username"];
$sum=0;
$sql="select qpoint from question where username='$user'";
$result= $conn->query($sql);
$sql1="select apoint from answer where username='$user'";
$result1= $conn->query($sql1);
if($result->num_rows>0){
while($rows=$result->fetch_assoc()){
$sum=$sum+$rows["qpoint"];
}
}
if($result1->num_rows>0){
while($rows=$result1->fetch_assoc()){
$sum=$sum+$rows["apoint"];
}
}
$sql3="update user set karmapoint=$sum where username='$user'";
if($conn->query($sql3) === TRUE){
}
else{
echo $conn->error;
}
}
}
$conn->close();
?>
