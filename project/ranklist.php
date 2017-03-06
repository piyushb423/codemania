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
    background-image: url('background_signup.jpg');
}
a {
text-decoration : none;
}
      
div.main{
  width:1000px;
  margin:0 auto;
}

div.welcome{
  width:750px;
  float:left;
  margin-left:40px;
  margin-right:40px;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

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

div.user a{
padding : 10px;
color: white;
background-color: black;
}

div.user a:hover{
background-color: red;
}
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table  tr:nth-child(even) {
    background-color: #eee;
}
table  tr:nth-child(odd) {
   background-color:#fff;
}
table th {
    background-color: black;
    color: white;
}
table tr#t01{
  background-color:#C4FFEB; 
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

<?php
  include("connection.php");
  $sql = "select name,college,username,karmapoint from user order by karmapoint desc";
  $result=$conn->query($sql);
  $f=1;
  echo '<table>
        <tr>
          <th>Rank</th>
          <th>Username</th>
          <th>Name</th>
          <th>College</th>
          <th>Point</th>
        </tr>';
  if($result->num_rows > 0){
    while(($row=$result->fetch_assoc())){
      $usename=$row["username"];
      $name=$row['name'];
      $kpoint=$row['karmapoint'];
      $college=$row['college'];
      if($_SESSION['login_user']==$usename){
          echo '<tr id="t01">';
          echo '<td>'. $f . '</td>';
          echo '<td>'.$usename. '</td>';
          echo '<td>'.$name. '</td>';
          echo '<td>'.$college. '</td>';
          echo '<td>'.$kpoint. '</td>';
          echo '</tr>';
      }
      else{  
          echo '<tr>';
          echo '<td>'. $f . '</td>';
          echo '<td>'.$usename. '</td>';
          echo '<td>'.$name. '</td>';
          echo '<td>'.$college. '</td>';
          echo '<td>'.$kpoint. '</td>';
          echo '</tr>';
          
      }
      $f=$f+1;
    }
  }
   echo '</table>';
?>
</div>
</body>
</html>
