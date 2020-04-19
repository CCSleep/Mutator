<?php session_start(); 
include("../common/bump.php");
include("../common/conn.php");

$user = $db->query("SELECT * FROM users WHERE username='{$_SESSION["username"]}'")->fetch_assoc();

$hour = date('H', time()) + 7;

if( $hour > 6 && $hour <= 11) {
  $dates = "Good Morning";
}
elseif($hour > 11 && $hour <= 16) {
  $dates = "Good Afternoon";
}
elseif($hour > 16 && $hour <= 23) {
  $dates = "Good Evening";
}
else {
  $dates = "Good Night";
}
?>

<head>
  <title>Portal - Mutator</title>
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
  <body onload="startTime();">
<?php include "../common/nav.php";  ?>

<br>

<div class="row" style="width: 90%; margin: 0 auto;">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title"><?php echo $dates; ?>, <?php echo $_SESSION["username"]; ?>!</h3>
        <p class="card-text">Points: <?php echo $user["points"]; ?>/100</p>
        <a href="zoom.php" class="btn btn-Success">Study!</a>
      </div>
    </div>
    
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Works to clear</h3>
        <?php 
        $q1 = $db->query("SELECT hwid FROM homework_clear WHERE status<>2 AND name='{$_SESSION["username"]}'");
        $works = "'".join("', '", $q1->fetch_assoc())."'";
        $q2 = $db->query("SELECT * FROM homework WHERE id NOT IN ($works)");
        while ($row = $q2->fetch_assoc()){
        ?>
        <p class="card-text">- <?php echo $row["name"]; ?> (<?php echo $row["points"]; ?> points)</p>
        <?php } ?>
      </div>
    </div>
  </div>
</div> 
<br>

</body>

</script>

