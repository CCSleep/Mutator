<?php session_start();
include("../common/adminbump.php");
include("../common/bump.php");
include("../common/conn.php");

$user = $db->query("SELECT * FROM users WHERE username='{$_SESSION["username"]}'")->fetch_assoc();

?>


<head>
  <title>Homeworks - Mutator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/assets/animate.css" />
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/c9d7447664.js"></script>
  <script src="/assets/sweetalert2.all.js"></script>
  <link rel="stylesheet" href="/assets/sweetalert2.css">

  <style>
  * { font-family: Kanit; }
  .vr{
border-left: 0.5px solid rgb(150,150,150);
  height: 50px;

}
  </style>
  <?php include "../common/jse.php"; ?>
  </head>
  <body>
<?php include "../common/nav.php";  ?>
<br>
<?php
if (isset($_POST["action"])) {
    switch ($_POST["action"]){
        case "adduser":
            $db->query("INSERT INTO users (username,password,rank) VALUES ('{$_POST["username"]}','{$_POST["password"]}','{$_POST["rank"]}')");
            ?>
            <div class="alert alert-info animated flipInX">
                Successfully added user <strong><?php echo $_POST["username"]; ?></strong>
            </div>
            <?php
            break;
        default:
            break;
    }
}
?>
<center><h1 class="animated fadeInDown">Admin Panel</h1></center><br>
<div class="wrapper" style="width: 90%; margin: 0 auto;">
    <h3>Add User</h3>
<form class="form-row" method="POST">
    <input type="hidden" name="action" value="adduser">
    <div class="col-4">
        <input class="form-control" placeholder="Username" type="text" name="username">
    </div>
    <div class="col-4">
        <input class="form-control" placeholder="Password" type="password" name="password">
    </div>
    <div class="col-2">
        <select class="form-control" name="rank">
      <option value="0">Student</option>
      <option value="1">Teacher</option>
    </select>
    </div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary">Add User</button>
    </div>
</form>
</div>
</body>