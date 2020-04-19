<?php
session_start(); 
include("../common/bump.php");
include("../common/conn.php");

?>
<head>
<meta charset="utf-8">
<title>Homework - Mutator</title>
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
  <body onload="startTime();">

    <?php include "../common/nav.php" ?>

    <?php if ($_SESSION["rank"] == 1) { 
      if (isset($_POST["cc"])){
  $content = $_POST["cc"];
  $sql = mysqli_query($db, "INSERT INTO `hw` (content,date) VALUES ('$content', CURRENT_DATE());");
  ?>
<br>
<div class="alert alert-success animated flipInX" role="alert">
  
  Successfully added <b><?php echo $content; ?></b> to the database.
</div>
<?php 
}
?> 
      <br>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4"><center><form method="post"><span><h1>Add Announcement</h1><br><input type="text" name="cc" class="form-control" placeholder="Announcement"></span><br><button type="submit" class="btn btn-block btn-success">Submit</button></form></center></div>
  <div class="col-md-4"></div>
</div>

<?php } ?>
<br>
<center><h3>Latest Announcement</h3></center>
<br>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Content</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
<?php


$qq = "SELECT * FROM hw";
$result = $db-> query($qq);
while($row = $result -> fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['content'];?></td>
    <td><?php echo $row['date'];?></td>
</tr>

<?php } ?>
</tbody>
</table>
<br><br>
</body>