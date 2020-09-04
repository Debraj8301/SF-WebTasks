<?php
session_start();
$connect = mysqli_connect('localhost', 'id14437013_root', 'Deb@12345678', 'id14437013_user_registration') or die("could not connect to database");
$msg = "";
$error = "";
$comment_name = "";
$comment_content = "";
$comment_sender_name = $_SESSION['username'];
if(empty($_POST['comment_name'])){
  $error .= '<p class="text-danger">Name is required</p>';
}else {
  $comment_name = mysqli_real_escape_string($connect, $_POST['comment_name']);
}
if(empty($_POST['comment_content'])){
  $error .= '<p class="text-danger">Comment is required</p>';
}else {
  $comment_content = mysqli_real_escape_string($connect, $_POST['comment_content']);
}
$parent_comment_id = mysqli_real_escape_string($connect, $_POST['comment_id']);
if($error == ""){
  $query = "INSERT INTO comment_system (parent_comment_id, topic_name, comment, comment_sender_name) VALUES ('$parent_comment_id', '$comment_name', '$comment_content', '$comment_sender_name')";
  mysqli_query($connect, $query);
  $msg .= '<label class="text-primary">Comment Added</label>';
}
$upCount = $_SESSION['upCount'];
$downCount = $_SESSION['downCount'];
$data = array(
  'error' => $error,
  'msg' => $msg,
  'upCount' => $upCount,
  'downCount' => $downCount
);
echo json_encode($data);


?>
