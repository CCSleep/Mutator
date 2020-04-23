<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
include "common/conn.php";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO users (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);

  }
}
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "กรุณาใส่รหัสนักเรียน");
  }
  if (empty($password)) {
  	array_push($errors, "กรุณาใส่ PIN");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $qinfo = $db->query("SELECT * FROM users WHERE username='{$username}'")->fetch_assoc();
      $_SESSION['rank'] = $qinfo["rank"];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: /page/portal.php');
  	}else {
  		array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
  	}
  }
}

?>