<?php session_start();
include("../common/adminbump.php");
include("../common/bump.php");
include("../common/conn.php");

$user = $db->query("SELECT * FROM users WHERE username='{$_SESSION["username"]}'")->fetch_assoc();

?>
<head>
  <title>Live Learning - Mutator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
<?php if ($_SESSION["rank"]==1) { ?>
<center><h1 class="animated fadeInDown">All Students</h1></center><br>
<table class="table" style="width:90%; margin:0 auto;">
  <thead>
    <tr>
      <th>Username</th>
      <th>Name</th>
      <th>Class</th>
      <th>Number</th>
      <th>Points</th>
    </tr>
  </thead>
  <tbody>
      <?php $q1 = $db->query("SELECT * FROM users WHERE rank=0");
      while ($row=$q1->fetch_assoc()) { ?>
    <tr>
     <th><?php echo $row["username"]; ?></th>
     <th><?php echo $row["name"]; ?></th>
     <th><?php echo $row["class"]; ?></th>
     <th><?php echo $row["num"]; ?></th>
     <th><?php echo $row["points"]; ?></th>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
</body>
