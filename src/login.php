<?php

session_start();

if ($_GET['r'] != 'results') {
  $IP = $_POST['ip_address'];
  $USERNAME = $_POST['username'];
  $PASSWORD = $_POST['password'];
  $dbName = $_POST["db"];
} else {
  $USERNAME = $_SESSION['user'];
  $PASSWORD = $_SESSION['pass'];
  $IP = $_SESSION['ip'];
  $dbName = $_SESSION['db'];


  $data = $_SESSION['query_result'];
  print_r($data);
}

$conn = new mysqli($IP, $USERNAME, $PASSWORD,$dbName);

if ($conn->connect_error) {
    $URL = "http://100.115.92.197/?pass=incorrect";
    header('Location: '.$URL);
    die("ERROR: " . $conn->connect_error);
}

$_SESSION['user'] = $USERNAME;
$_SESSION['pass'] = $PASSWORD;
$_SESSION['ip'] = $IP;
$_SESSION['db'] = $dbName;

include("html/success.html");


$QUERY1 = "SHOW TABLES";

$response = $conn->query($QUERY1);


if (mysqli_num_rows($response)>0){
  echo "<script type=text/javascript>document.getElementById('msg').innerHTML = '';</script>";
  while ($row = mysqli_fetch_assoc($response)){

    $result = $row["Tables_in_".$dbName];

    $QUERY2 = "SELECT COUNT(*) FROM {$result}";
    $response2 = $conn->query($QUERY2);

    if (mysqli_num_rows($response2)>0){
      $row = mysqli_fetch_assoc($response2);
      
      $result2 = $row['COUNT(*)'];
      echo "<script type=text/javascript>document.getElementById('msg').innerHTML += '$result - $result2<br/>' ;</script>";
    }
  }
} else {
  echo "Found no results";
}

echo "<script type=text/javascript>document.getElementById('dbName').innerHTML = '$dbName';</script>";

if ($_GET['r'] == 'results'){
  $v = implode(" ",$data);
  echo "<script type=text/javascript>document.getElementById('query_results').innerHTML += '$v' ;</script>";
}


?>