<?php

session_start();

$USERNAME = $_SESSION['user'];
$PASSWORD = $_SESSION['pass'];
$IP = $_SESSION['ip'];
$dbName = $_SESSION['db'];

$query = $_POST['command'];
$_SESSION['query_result'] = array();

$conn = new mysqli($IP, $USERNAME, $PASSWORD,$dbName);

if ($conn->connect_error) {
    $URL = "http://100.115.92.197/?pass=incorrect";
    header('Location: '.$URL);
    die("ERROR: " . $conn->connect_error);
}

$response = $conn -> query($query);

if (mysqli_num_rows($response)>0){
  while ($row = mysqli_fetch_assoc($response)){
    array_push($_SESSION['query_result'],implode(" ",$row)."<br/>");
    
  }
} else {
  $_SESSION['query_results'] = "No response given, if this is not right, there may be an error in your SQL";
}

header("Location: http://100.115.92.197/login.php?r=results");

?>