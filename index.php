<?php include "server.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - Mutator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/animate.css" />
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  .left {
  position: absolute;
  bottom: 45%;
  left: 2%;
}
 .right {
  position: absolute;
  bottom: 20%;
  right: 2%;
}
.btn-link { text-decoration: none !important; font-size: 20px; font-weight:bold; color: #FF1493;}
.btn-link:hover { text-decoration: none !important; font-size: 20px; font-weight:bold; color: #FF1493;}
	* { font-family: Kanit; }

input {
	background: transparent;
	border: none;
  border-bottom: 1px solid #000000;
  box-shadow: none;
}
input:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
  outline: none;
  border-bottom: 1px solid #FF1493;
}
.btn-primary:hover {
    background-color: #ff45aa !important;
}
.right2 {
  color:#FFFFFF;
  position: absolute;
  bottom: 14%;
  right: 10%;
}

  </style>
  <script>
  focusFunc = function () { 
  x = "code";  
  document.getElementById(x).focus();
}
focusPin = function () {
	x = "pin";
	document.getElementById(x).focus();
}
var x = "code";
  </script>
</head>
<body>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
	<li data-target="#demo" data-slide-to="3"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="5000">
      <img src="Slide/FlyingHigher.jpg">
	  <div class="left">
	  <div class="card bg-dark animated fadeInDown" >
	  
	  
  <div class="card-body">
  <div class="card-title" style="color: #FF1493; font-size: 30px;">
  <b>Flying Higher</b>
  </div>
  <div class="card-text" style="color: #FFFFFF; ">
บินไปให้สูงสุดฟ้า คว้าฝันให้ได้อย่างที่ฝัน เพียงแค่อดทนมุ่งมั่นทำมัน ความสำเร็จนั้นจะกลายเป็นจริง
  </div>
</div>
	  </div>
    </div>
	</div>
    <div class="carousel-item" data-interval="5000">
      <img src="Slide/PiggyBank.jpg">
	  <div class="left">
	  <div class="card bg-dark animated fadeInDown" >
	  
	  
  <div class="card-body">
  <div class="card-title" style="color: #FF1493; font-size: 30px;">
  <b>Piggy Bank</b>
  </div>
  <div class="card-text" style="color: #FFFFFF; ">
การเรียนเหมือนการหยอกกระปุก ค่อยๆ สะสมไปเรื่อยๆ เดี๋ยวมันก็เต็ม
  </div>
</div>
	  </div>
    </div>
    </div>
    <div class="carousel-item" data-interval="5000" >
      <img src="Slide/Orchid.jpg">
	  <div class="left">
	  <div class="card bg-dark animated fadeInDown" >
	  
	  
  <div class="card-body">
  <div class="card-title" style="color: #FF1493; font-size: 30px;">
  <b>Orchid</b>
  </div>
  <div class="card-text" style="color: #FFFFFF; ">
อดทนปลูกความเพียร ทำโจทย์เยอะๆ ทบทวนบ่อยๆ มันจะงดงาม หอมหวาน คุ้มค่า
  </div>
</div>
	  </div>
    </div>
    </div>
	<div class="carousel-item" data-interval="5000">
      <img src="Slide/Plant.jpg">
	  <div class="left">
	  <div class="card bg-dark animated fadeInDown" >
	  
	  
  <div class="card-body">
  <div class="card-title" style="color: #FF1493; font-size: 30px;">
  <b>Plant</b>
  </div>
  <div class="card-text" style="color: #FFFFFF; ">
การศึกษาเหมือนดังปลูกผลไม้ ค่อยๆรดน้ำ พรวนดิน เพียรทำเหตุให้ถึงพร้อม พอวันที่ผลออกมา มันก็จะหอมอร่อย กินแล้วชื่นใจ
  </div>
</div>
	  </div>
    </div>
    </div>
  </div>
  <div class="btn-group right2" style="color: #FFFFFF;">
	Platform by&nbsp;<img src="assets/logo.png" height="20" width="20" style="margin-top: 2px">
	</div>
  <form autocomplete="off" method="post">
 <div class="btn-group-vertical ml-4 mt-4 right" role="group" style="background-color: #FFFFFF; padding: 20px; background-color: rgba(255, 255, 255, 0.9);" aria-label="Basic example">
    <?php include "error.php"; ?>
	<div align="center">รหัสนักเรียน</div>
	<div class="btn-group">
        <input class="text-center form-control-lg mb-2" onclick="focusFunc();" id="code" name="username" />
    </div>
	<div align="center">PIN</div>
	<div class="btn-group">
        <input class="text-center form-control-lg mb-2" type="password" onclick="focusPin();" id="pin" name="password" />
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '1';">1</button>
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '2';">2</button>
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '3';">3</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '4';">4</button>
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '5';">5</button>
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '6';">6</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '7';">7</button>
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '8';">8</button>
        <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '9';">9</button>
    </div>
    <div class="btn-group">
         <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=''">C</button>
         <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value + '0';">0</button>
         <button type="button" class="btn btn-link py-3" onclick="if (x === 'code') {focusFunc();} else {focusPin();} document.getElementById(x).value=document.getElementById(x).value.slice(0, -1);">&lt;</button>
       
    </div><br>
	<div class="btn-group">
	<button type="submit" class="btn btn-block btn-primary" style=" background-color: #FF1493;" name="login_user">Login</div>
		
	
</div>	

</form>

</div>


</body>
</html>
