<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";
/*$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/
$conn->close();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}/*
$user = fopen("register.txt", "r") or die("Unable to open file!");
$usertable=fread($user,filesize("register.txt"));
if ($conn->query($usertable) === TRUE) {
    echo "usertable created successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}
fclose($user);/*
$sql = "drop table user";
if ($conn->query($sql) === TRUE) {
    echo "Drop table successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/

//$sql1 = "INSERT INTO user VALUES ('piyush','piyushb423@gmail.com','piyushb423','1234567','mnit','female')";
/*
if ($conn->query($sql1) === TRUE) {
    echo "table successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$sql2="ALTER TABLE user ADD COLUMN karmapoint INT DEFAULT 0";
if ($conn->query($sql2) === TRUE) {
    echo "add column";
} else {
    echo "Erroradding column " . $conn->error;
}*/
$sql = "SELECT name, password,username ,karmapoint FROM user";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["name"] ."password: " . $row["password"]. "userName: " . $row["username"] . "karmapoints ". $row["karmapoint"] ."<br>";
    }
} else {
    echo "0 results";
}

/*
$sql = "SELECT ID,question FROM question ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "question: " . $row["question"] ."<br>";
        echo  $row["ID"];
    }
} else {
    echo "0 results";
}*/
/*
$sql2 = "DELETE FROM question ";
if ($conn->query($sql2) === TRUE){
   echo "delete columns";
   
  } else {
    echo "delete Table:" . $conn->error;
   
   }*/
/*
$que = fopen("question.txt", "r") or die("Unable to open file!");
$qtable=fread($que,filesize("question.txt"));
if ($conn->query($qtable) === TRUE) {
    echo "table created successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}
fclose($que);
*//*
$que = fopen("answer.txt", "r") or die("Unable to open file!");
$qtable=fread($que,filesize("answer.txt"));
if ($conn->query($qtable) === TRUE) {
    echo "table created successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}
fclose($que);*/
/*$sql2="ALTER TABLE question ADD COLUMN tag varchar(30)";
if ($conn->query($sql2) === TRUE) {
    echo "add column";
} else {
    echo "Erroradding column " . $conn->error;
}*/
/*
$sql = "Drop table qvote";
if ($conn->query($sql) === TRUE) {
    echo "table created successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}*//*
$sql = "Drop table question";
if ($conn->query($sql) === TRUE) {
    echo "table created successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}*/
/*
$sql = "Drop table answer";
if ($conn->query($sql) === TRUE) {
    echo "table dropped successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}*/
/*
$que = fopen("qvote.txt", "r") or die("Unable to open file!"); 
$qtable=fread($que,filesize("qvote.txt")); 
if ($conn->query($qtable) === TRUE) { 
    echo "table created successfully"; 
} else { 
    echo "Error creating Table:" . $conn->error; 
} 
fclose($que);*/
/*
$que = fopen("avote.txt", "r") or die("Unable to open file!"); 
$qtable=fread($que,filesize("avote.txt")); 
if ($conn->query($qtable) === TRUE) { 
    echo "table created successfully"; 
} else { 
    echo "Error creating Table:" . $conn->error; 
} 
fclose($que);*/
/*
$user = fopen("tag.txt", "r") or die("Unable to open file!");
$usertable=fread($user,filesize("tag.txt"));
if ($conn->query($usertable) === TRUE) {
    echo "usertable created successfully";
} else {
    echo "Error creating Table:" . $conn->error;
}
fclose($user);*/
$conn->close();
?>
