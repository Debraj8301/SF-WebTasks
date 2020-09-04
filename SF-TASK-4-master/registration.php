<?php


$username = "";
$email = "";
$birthdate = "";
$gender = "";
$account = "";

$errors = array();
$db = mysqli_connect('localhost', 'id14437013_root', 'Deb@12345678', 'id14437013_user_registration') or die("could not connect to database");

if(isset($_POST['register'])){

  if(session_status() == PHP_SESSION_NONE){
      //session has not started
      session_start();
  }



$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);

$gender =  $_POST['gender'] ;
$account = mysqli_real_escape_string($db, $_POST['account']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$confirmpassword =mysqli_real_escape_string($db, $_POST['confirmpassword']);

if(strlen($password) < 8) array_push($errors, "Password must have 8 characters");
if($password != $confirmpassword) array_push($errors, "Passwords do not match");

$user_check = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysqli_query($db, $user_check);
$user = mysqli_fetch_assoc($results);

if($user){
  if($user['username'] === $username) array_push($errors, "Username already exists");
  if($user['email'] === $email) array_push($errors, "Email-Id already has a registerd username");

}
if(count($errors) == 0){

  $query = "INSERT INTO users (username, email, birthdate, gender, account, password) VALUES ('$username', '$email', '$birthdate', '$gender', '$account', '$password')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  $_SESSION['account'] = $account;
  header("location: Home.php");
}

}
