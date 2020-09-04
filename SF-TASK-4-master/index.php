<?php require 'registration.php' ?>
<?php require 'login.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>User Forum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.php">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
    p {
      color: red;
    }
    </style>


  </head>
  <body>
  <div class="container">
    <div class = "form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()">Log-In</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
      </div>
      <form  id = "login" class="input-group" method="post" enctype="multipart/form-data" autocomplete="off">
        <?php if($lerrors != "") : ?>
        <p><?php echo $lerrors ?></p>

      <?php endif ?>
        <input type="text" class="input-feild" placeholder="Username" name = "username" required>
        <input type="password" class="input-feild password" id="password" placeholder="Password" name="password" autocomplete="new-password" required><i class="fa fa-eye" onclick="passwordShow()" aria-hidden="true"></i>
        <label for "Admin"> Account Type : </label>
        <label><input type="radio" class="checkbox" name= "account" value="Admin" required> Admin </label>
        <label><input type="radio" class="checkbox" name="account" value="User" required> User </label>
        <button type="submit" class="logIn" name = "login">Log-In</button>
        <div class = "connect"><p> or connect with </p></div>
        <div class = "social">
          <a href="#" class = "social-icon"><i class="fa-4x fa fa-facebook-official" aria-hidden="true"></i></a>
          <a href="#" class = "social-icon"><i class="fa-4x fa fa-google-plus-square" aria-hidden="true"></i></a>
          <a href="#" class = "social-icon"><i class="fa-4x fa fa-linkedin-square" aria-hidden="true"></i></a>
        </div>
      </form>
      <form id="register" class="input-group" method="post" enctype="multipart/form-data" autocomplete="off">
        <?php if(count($errors) > 0) : ?>
        <p><?php echo $errors[0] ?></p>
         <script type='text/javascript'> alert("Register Again") </script>
      <?php endif ?>
        <input type="text" class="input-feild" id="username" placeholder="Username" name="username" required>
        <input type="email" class="input-feild" id="email" placeholder="E-mail" name="email" required>
        <span><input type="text" class="input-feild" id = "datepicker" placeholder="Date of Birth" name="birthdate"><i class="fa fa-calendar" id="date_picker" aria-hidden="true"></i></span>
        <label for "Male"> Gender : </label>
        <label><input type="radio" class="checkbox" name= "gender" value="Male"> Male </label>
        <label><input type="radio" class="checkbox" name="gender" value="Female"> Female </label>
        <input type="password" class="input-feild password" id="pass1"  placeholder="Password(atleast 8 characters)" name="password" autocomplete="new-password" required><i class="fa fa-eye" onclick="passwordShow()" aria-hidden="true"></i>
        <input type="password" class="input-feild password" id="pass2" placeholder="Confirm-Password" name="confirmpassword"  autocomplete="new-password" required><i class="fa fa-eye" onclick="passwordShow()" aria-hidden="true"></i>
        <label for "Admin"> Account Type : </label>
        <label><input type="radio" class="checkbox" name= "account" value="Admin" required> Admin </label>
        <label><input type="radio" class="checkbox" name="account" value="User" required> User </label>
        <button type="submit" class="logIn" id="reg" name="register" value="Register">Register</button>
      </form>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

  $(function(){
    $("#datepicker").datepicker();
  });
  function passwordShow(){
    var sound = new Audio("kick-bass.mp3");
    sound.play();
    var p = document.getElementById("password");
    var j = document.getElementById("pass1");
    var m = document.getElementById("pass2");
  if (p.type === "password" || j.type === "password" || m.type === "password") {
    p.type = "text";
    j.type = "text";
    m.type = "text";
  } else {
    p.type = "password";
    j.type = "password";
    m.type = "password";
  }
  }

  </script>
  <script>
  var sound = new Audio("sound.mp3");
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  var z = document.getElementById("btn");
  function register(){
    sound.play();
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
  }
  function login(){
    sound.play();
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
  }

  </script>

  </body>
</html>
