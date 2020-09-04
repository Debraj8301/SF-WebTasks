<?php
header('Content-type: text/css; charset:UTF-8');
?>
* {
  margin : 0;
  padding : 0;
  font-family: sans-serif;
}

.container {
  height: 100%;
  width: 100%;
  position: absolute;
  display: flex;
  background-image: url(background.jpg);
  background-position: center;
  background-size: cover;
  position: absolute;
  text-align: center;
}
.header {
  margin: 6% auto;
  text-align: center;
  color: black;
}
.form-box {
  width: 380px;
  height: 545px;
  position: relative;
  margin: 6% auto;
  background: #fff;
  padding: 5px;
  display: block;
  overflow: hidden;
  background-color: #ffcc80;
  border-radius: 20px;
  border: 2px solid #ff9933;
}
.button-box {
  width : 220px;
  margin: 35px auto;
  position: relative;
  box-shadow: 0 0 20px 9px #ccffee;
  border-radius: 30px;
}
.toggle-btn {
  padding: 10px 30px;
  cursor: pointer;
  background: transparent;
  border: 0;
  outline: none;
  position: relative;
}
#btn {
  top: 0;
  left: 0;
  position: absolute;
  width: 110px;
  height: 100%;
  background: linear-gradient(to right, #99ffdd, #006644);
  border-radius: 30px;
  transition: 0.5s;
}
.input-group {
  top: 100px;
  width: 280px;
  position: absolute;
  transition: 0.5s;
}
.input-feild {
  width: 100%;
  padding: 10px 0px;
  margin: 5px 0px;
  border-left: 0;
  border-top: 0;
  border-right: 0;
  border-bottom: 1px solid #999;
  outline: none;
  background: transparent;
}
.logIn {
  width: 85%;
  padding: 10px 30px;
  cursor: pointer;
  display: block;
  margin: auto;
  background: linear-gradient(to right, #99ffdd, #006644);
  border: 0;
  outline: none;
  border-radius: 30px;
}
.checkbox {
  margin: 30px 5px 30px 0;
}
label {
  margin-left: 0px;
  color: #777;
  font-size: 15px;

}
.connect {
  text-align: center;
  font-family: sans-serif;
  margin-top: 50px;
  border-bottom: 1px solid #999;
  color: black;
}
.social {
  margin: 30px auto;
  text-align: center;
  margin-top: 45px;
}
.social-icon {
  padding: 10px;
  color: #006644;
}
.social-icon:hover {
  color: #99ffdd;
}
#login {
  left: 50px;
}
#register {
  left: 450px;
}
.alert{
  height: 30px;
  width: 85%;
  color: red;
  text-align: center;
}
#datepicker {
  width: 90%;
}
.password {
  width: 92%;
}
