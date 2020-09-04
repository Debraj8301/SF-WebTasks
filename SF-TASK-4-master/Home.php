<?php
session_start();
if(!isset($_SESSION['username'])){
  session_destroy();
  header("Location:index.php");
}
unset($errors);
$lerrors = "";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Comment System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
      .background {
        background-image: url(background.jpg);
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        position: absolute;
        min-height: 100%;
        width: 100%;
      }
      h2 {
        color: #ffcc80;
        font-size: 40px;
        font-family: sans-serif;
        font-weight: bold;
      }
      .navbar {
        width: 100%;
        position: sticky;
        height: 70px;
        background-color: #008080;
      }
      .nav-items {
        padding: 20px;

      }
      .logo {
        color: #ffcc80;
        font-size: 25px;
        margin-left: 40px;
        font-weight: bold;
      }

      .nav-link {
        padding: 0 20px;
        font-size: 20px;
        float: right;
        color: #ffcc80;
      }
      a {
        text-decoration: none;
        color: white;
      }
      a:hover {
        color: #99ffdd;
        text-decoration: none;
        cursor: pointer;
      }
      #display_comment {
        margin-top: 40px;
      }

      @media screen and (max-width: 1240px){
        .out1 {
          display: none;
        }
      }
        @media screen and (max-width: 1040px){
          .out2 {
            display: none;
          }
      }
    </style>

    </head>
  <body>
    <div class="background">

      <nav class="navbar">
        <div class="nav-items">
        <label class="logo"> Trending Topics </label>

          <a class="nav-link active" href="#"> #corona </a>
          <a class="nav-link" href="#"> #bantiktok </a>
          <a class="nav-link" href="#"> #luciferS5 </a>
          <a class="nav-link" href="#"> #modiji </a>
          <a class="nav-link" href="#"> #nepotism </a>
          <a class="nav-link out2" href="#"> #IndianArmy </a>
          <a class="nav-link out1" href="#"> #BoycottChina </a>

        </div>

      </nav>
    <br />
    <h2 align="center"> Welcome <?php echo $_SESSION['username']?> <em>(<?php echo $_SESSION['account']?>)</em>
    <button class="btn btn-danger"><a href="logout.php">Log-Out</a></button></h2>

    <br />
    <div class="container">
      <form method="POST" id="comment_form">
        <div class="form-group">
          <select name="comment_name" id="comment_name" class="form-control" required>
            <option value="" disabled selected>Enter Topic</option>
            <option value="#BoycottChina">BoycottChina</option>
            <option value="#IndianArmy">IndianArmy</option>
            <option value="#nepotism">nepotism</option>
            <option value="#modiji">modiji</option>
            <option value="#luciferS5">luciferS5</option>
            <option value="#bantiktok">bantiktok</option>
            <option value="#corona">corona</option>
          </select>

        </div>
        <div class="form-group">
          <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
        </div>
        <div class="form-group">
          <input type="hidden" name="comment_id" id="comment_id" value="0" />
          <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </form>
        <div>
          <span id="comment_message"></span>
        </div>
    <div id="display_comment"></div>
  </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
var sound = new Audio("sound.mp3");


$("#comment_form").on('submit', function(event){
  sound.play();
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
    url: "add_comment.php",
    method: "POST",
    data: form_data,
    dataType: "JSON",
    success: function(data){
      if(data.error != ""){
        $("#comment_form")[0].reset();

        $("#comment_message").html(data.error);
        console.log("Done");
      }else {
          $("#comment_message").html(data.msg);
          load_comment();
        $("#upCount").html(data.upCount);
        $("#downCount").html(data.downCount);
        $("#upReplyCount").html(data.upCount);
        $("#downReplyCount").html(data.downCount);
      }
    }
  });
});



function load_comment(){
  $.ajax({
    url: 'fetch_comment.php',
    method: "POST",
    success: function(data){

      $("#display_comment").html(data);

    }
  });
}
load_comment();
react();

$(document).on('click', '.reply', function(){
  sound.play();
  var comment_id = $(this).attr("id");
  comment_id = comment_id.replace('comment-', '');
  $("#comment_id").val(comment_id);
  $("#comment_name").focus();
});
function deletePost(comment_id){
  if(confirm("Are you sure you want to delete this comment?")){
    $.ajax({
        url: "delete.php",
        method: "POST",
        data: {
          comment_id: comment_id
        }, success: function(data){
          if(data){

            $("#panel-"+comment_id).remove();
            $("#panel-reply-"+comment_id).remove();
          }
        }
    });
  }

}

$(document).on('click', '.delete', function(){
  sound.play();
  var comment_id = $(this).attr("id");
  deletePost(comment_id);
});

function react(caller, comment_id, type){

  $.ajax({
    url: "reactions.php",
    method: "POST",
    dataType: "JSON",
    data: {

      comment_id: comment_id,
      type: type
    }, success: function(data){

      if(data.status === "updated"){
        if(type === "up"){
          $("#down-"+comment_id).css('color', "");
          $("#upCount").html(data.upCount);
          $("#upReplyCount").html(data.upCount);
        }else {
          $("#up-"+comment_id).css('color', "");
          $("#downCount").html(data.downCount);
          $("#downReplyCount").html(data.downCount);
        }
      }
      $(caller).css('color', 'blue');
      $("#upCount").html(data.upCount);
      $("#downCount").html(data.downCount);
      $("#upReplyCount").html(data.upCount);
      $("#downReplyCount").html(data.downCount);

    }
  });
}
$(document).on('click', '.up', function(){
  sound.play();
  var comment_id = $(this).attr("id");
  comment_id = comment_id.replace('up-', '');
  react(this, comment_id, "up");
});

$(document).on('click', '.down', function(){
  sound.play();
  var comment_id = $(this).attr("id");
  comment_id = comment_id.replace('down-', '');
  react(this, comment_id, "down");
});

});

</script>
</body>

</html>
