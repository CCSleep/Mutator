<?php session_start();
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
<center><h1 class="animated fadeInDown">Live Learning</h1></center><br>
<?php if ($_SESSION["rank"]==1) { ?>
<?php if (isset($_GET["id"])) { ?>
<h3 align="center" class="animated fadeIn">Connected on room <strong><?php echo $_GET["id"]; ?></strong></h3><br>
<center><div align="center" id="otEmbedContainer" style="width:800px; height:640px"></div></center>
<script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=16839873-27e0-475f-843a-6f2cc91fcf2e&room=<?php echo $_GET["id"]; ?>"></script>
<?php } else {?>

<center>
    <form align="center" class="animated fadeIn" method="get" action="" style="display: flex; justify-content: center; ">
    <span class="form-group">
        <input class="form-control searchbar" type="text" placeholder="Enter Room ID" name="id" style="width: 100%; margin-left: auto; margin-right: auto;"></span>
        <span class="form-group">
            <button type="submit" class="btn btn-success">Enter Room</button>
            </span>
</form>
</center>

<?php } ?>
<?php } else { ?>
<center><div align="center" id="otEmbedContainer" style="width:800px; height:640px"></div></center>
<script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=16839873-27e0-475f-843a-6f2cc91fcf2e&room=<?php echo $user["class"]; ?>"></script>
<?php } ?>
</body>
