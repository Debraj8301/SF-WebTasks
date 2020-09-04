<?php

session_start();
$connect = mysqli_connect('localhost', 'id14437013_root', 'Deb@12345678', 'id14437013_user_registration') or die("could not connect to database");

$query = "SELECT * FROM comment_system WHERE parent_comment_id = '0' ORDER BY comment_id DESC";
$result = mysqli_query($connect, $query);
$account = $_SESSION['account'];
$output = "";
 while ($row = mysqli_fetch_assoc($result)){
   if($account == "Admin"){
   $output .= '
      <div class = "panel panel-default" id="panel-'.$row['comment_id'].'">
        <div class="panel-heading"> By <b>' .$row['comment_sender_name']. '</b> on <i>' .$row['date']. '</i> about <b>' .$row['topic_name']. '</b></div>
        <div class="panel-body">' .$row['comment']. '</div>
        <div class="panel-footer" align="right"><i id="upCount"></i><i class="fa fa-2x fa-thumbs-up up" id="up-'.$row['comment_id'].'" style="padding: 0 10px" aria-hidden="true"></i><i id="downCount"></i><i class="fa fa-2x fa-thumbs-down down" id="down-'.$row['comment_id'].'" style="padding: 0 10px" aria-hidden="true"></i><button type="button" class="btn btn-secondary reply" id="comment-'.$row['comment_id'].'">Reply</button><button type="button" class="btn btn-warning delete" id="'.$row['comment_id'].'">
        Delete</button></div></div>' ;
        $output .= get_reply_comment($connect, $row['comment_id']);
      } else {
        $output .= '
           <div class = "panel panel-default" id="panel-'.$row['comment_id'].'">
             <div class="panel-heading"> By <b>' .$row['comment_sender_name']. '</b> on <i>' .$row['date']. '</i> about <b>' .$row['topic_name']. '</b></div>
             <div class="panel-body">' .$row['comment']. '</div>
             <div class="panel-footer" align="right"><i id="upCount"></i><i class="fa fa-2x fa-thumbs-up up" id="up-'.$row['comment_id'].'" style="padding: 0 10px" aria-hidden="true"></i><i id="downCount"></i><i class="fa fa-2x fa-thumbs-down down" id="down-'.$row['comment_id'].'" style="padding: 0 10px" aria-hidden="true"></i><button type="button" class="btn btn-secondary reply" id="comment-'.$row['comment_id'].'">
             Reply</button></div></div>' ;
             $output .= get_reply_comment($connect, $row['comment_id']);
      }
   }
echo $output;
function get_reply_comment($connect, $parent_id = 0, $marginleft = 0){
  $query = "SELECT * FROM comment_system WHERE parent_comment_id= '" .$parent_id. "'";
  $output = "";
  $result = mysqli_query($connect, $query);
  if($parent_id == 0){
    $marginleft = 0;
  }
  else {
    $marginleft = $marginleft + 48;
  }
  while ($row = mysqli_fetch_assoc($result)){
    $output .= '<div class="panel panel-default" id="panel-reply-'.$parent_id.'" style="margin-left : ' .$marginleft. 'px">
    <div class="panel-heading"> By <b>' .$row['comment_sender_name']. '</b> on <i>'  .$row['date']. '</i></div>
    <div class="panel-body">' .$row['comment']. '</div>
    <div class="panel-footer" align="right"><i id="upReplyCount"></i><i class="fa fa-2x fa-thumbs-up up" id="up-'.$row['comment_id'].'" style="padding: 0 10px" aria-hidden="true"></i><i id="downReplyCount"></i><i class="fa fa-2x fa-thumbs-down down" id="down-'.$row['comment_id'].'" style="padding: 0 10px" aria-hidden="true"></i><button type="button" class="btn btn-secondary reply" id="comment-'.$row['comment_id'].'">
    Reply</button></div></div>' ;
    $output .= get_reply_comment($connect, $row['comment_id'], $marginleft);
  }

  return $output;
}

?>
