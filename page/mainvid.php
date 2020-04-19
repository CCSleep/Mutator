<?php 
session_start();
include "../common/conn.php";
include "../common/bump.php";

?>
<?php
/*
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
	*/
?>



<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="/assets/bootstrap.css" /></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="/assets/sweetalert2.all.js" /></script>
<link rel="stylesheet" href="/assets/sweetalert2.css" /></script>
<link rel="stylesheet" href="/assets/animate.css" /></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/c9d7447664.js"></script>
	<title>Class Video - Mutator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

	<style>
      * { font-family: Kanit; }

    .img {
  position: relative;
  padding-bottom: 56.2%;
}

.img img {
  position: absolute;
  object-fit: cover;
  width: 100%;
  height: 100%;
}

    @media screen and (min-width: 1224px) {
    .wrapper {
        width: 90%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 20px;
    }
    .searchbar {
        width: 1000px;
    }
}

@media screen and (min-width: 1044px) and (max-width: 1224px) {
    .wrapper {
        width: 90%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 20px;
    }
    .searchbar {
        width: 750px;
    }
}

@media screen and (min-width: 845px) and (max-width: 1044px) {
    .wrapper {
        width: 90%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
    }
    .searchbar {
        width: 600px;
    }
}

@media screen and (max-width: 844px) {
    .wrapper {
        width: 90%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 20px;
    }
    .searchbar {
        width: 500px;
    }
}

</style>
</head>
<body onload="startTime();">

<?php include "../common/nav.php"; ?>
<br><br>
<div class="animated fadeInDown"><center><h1>Latest Class Videos</h1></center></div>
<br><br>

<div class="wrapper" style="animation-delay: 1s;">

<?php

$q = "SELECT * FROM videos ORDER BY id DESC";
$result = $db-> query($q);
while($row = $result -> fetch_assoc()) { ?>
<div class="item">
    <div class="img">
    <a href="watch.php?v=<?php echo $row['v'];?>"><img src="<?php echo $row['tn'];?>"></a>
    </div>
   <b><a href="watch.php?v=<?php echo $row['v'];?>"><?php echo $row['name'];?></b></a><br>Teacher ID: <?php echo $row['username'];?>

</div>
<?php } ?>
</div>


<!--<?php

   /*$tin = mysqli_connect("localhost", "root", "dc0e0349c5b986a11d5eeaf1b4c739a1acb0fd11923e398d","videos");
	
   $sql = "SELECT * FROM videos WHERE Name LIKE '%".$strKeyword."%' ";

   $query = mysqli_query($tin,$sql);

?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">name </div></th>
    <th width="98"> <div align="center">username </div></th>
    <th width="198"> <div align="center">goto </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["name"];?></div></td>
    <td align="right"><?php echo $result["username"];?></td>
    <td><a class="btn btn-success" href="https://dev1707.tk/page/watch.php?v=<?php echo $row['v'];?>">Watch!</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($tin);*
?>-->*/
?>
-->
<br><br>

</body>

</html>
<script src="/assets/bootstrap.js" /></script>
