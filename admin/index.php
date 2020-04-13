<?php
session_start();
$errors = array(); 

if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (empty($username)) {
  	array_push($errors, "กรุณาใส่ Username");
  }
  if (empty($password)) {
  	array_push($errors, "กรุณาใส่รหัสผ่าน");
  }

  if (count($errors) == 0) {
  	if ($username === "admin" && $password==="1234") {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  echo('<script>alert("OK");</script>');
  	}else {
  		array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
  	}
  }
}

?>
<?php  if (count($errors) > 0) : ?>
  <br>
  	<?php foreach ($errors as $error) : ?>
	<div class="alert alert-danger animated flipInX">
	<?php echo $error ?>
	</div>
  	<?php endforeach ?>
  
<?php  endif ?>
<head>
 <title>SupK Admin Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/assets/animate.css" />
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  </head>
  <br><br>
  <center><h2>Admin Panel</h2></center>
  <br><br>
<div class="row">
    <br>
	<div class="col-md-3"></div>
      <div class="col-md-6">
	<form method="POST" action="" accept-charset="UTF-8">
	<label for="username">Username:</label>
	<input class="form-control" name="username" type="text" value="" name="username">
	<br>
	<label for="password">Password:</label>
	<input class="form-control" name="password" type="password" value="" name="password">
	<br>
	<input class="btn btn-primary btn-block" type="submit" value="Login" name="login_user">
	</form>
</div>
<div class="col-md-3"></div>
    </div>

