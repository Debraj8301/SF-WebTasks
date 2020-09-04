<?php
$username = "";
$account = "";
$lerrors = "";
$db = mysqli_connect('localhost', 'id14437013_root', 'Deb@12345678', 'id14437013_user_registration') or die("could not connect to database");

if(isset($_POST['login'])){
  session_start();
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $account = mysqli_real_escape_string($db, $_POST['account']);



    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND account = '$account'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
    if($row['username'] == $username && $row['password'] == $password && $row['account'] == $account){
      $_SESSION['username'] = $username;
      $_SESSION['account'] = $account;
      $_SESSION['success'] = "Logged in succesfully";
      header('location: Home.php');
    }else {
      $lerrors = "Wrong User Info";

    }


}
