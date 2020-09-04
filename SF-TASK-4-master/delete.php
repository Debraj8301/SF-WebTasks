<?php
$connect = mysqli_connect('localhost', 'id14437013_root', 'Deb@12345678', 'id14437013_user_registration') or die("could not connect to database");
$comment_id = mysqli_real_escape_string($connect, $_POST['comment_id']);
$response = mysqli_query($connect, "DELETE FROM comment_system WHERE comment_id = '$comment_id' ||  parent_comment_id = '$comment_id'");

echo true;

?>
