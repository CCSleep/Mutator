<?php session_start();
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
<?php if ($_SESSION["rank"]==1){?>
<?php 
if (isset($_POST["accept"])) {
    $db->query("UPDATE homework_clear SET status=1, score={$_POST["score"]} WHERE id={$_POST["id"]}");
    $db->query("UPDATE users SET points=points+{$_POST["score"]} WHERE username={$_POST["stid"]}");
    ?>
    <div class="alert alert-success animated flipInX">
        Successfully checked <strong><?php echo $_POST["stid"]; ?></strong>'s homework
    </div>
    <?php
}elseif (isset($_POST["decline"])){
    $db->query("UPDATE homework_clear SET status=2 WHERE id={$_POST["id"]}");
    ?>
    <div class="alert alert-success animated flipInX">
        Successfully declined <strong><?php echo $_POST["stid"]; ?></strong>'s homework
    </div>
    <?php
}
?>
<center><h1 class="animated fadeInDown">Check Homework</h1></center><br>
<?php 
$q4 = $db->query("SELECT * FROM homework_clear WHERE status=0");
while ($row = $q4->fetch_assoc()){
    $name = $db->query("SELECT name FROM homework WHERE id=".$row["hwid"]); 
    $name = $name->fetch_assoc();
    $name = $name["name"];
?>
<div class="card bg-info text-white w-50" style="margin: 0 auto;">
    <div class="card-header">
        Homework
    </div>
    <div class="card-body">
    <h4 class="card-title"><?php echo $name; ?></h4>
    <p class="card-text">Student: <?php echo $db->query("SELECT * FROM users WHERE username='{$row["name"]}'")->fetch_assoc()["name"]; ?></p>
        <a href="<?php echo $row["file"]; ?>" class="btn btn-primary" download>Download File</a>
        
    <div style="display: flex;">
    <form method="POST">
        <br>
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <input type="hidden" name="stid" value="<?php echo $row["name"]; ?>">
        <input type="number" class="form-control" style="width:40%;" name="score" placeholder="Score" value="0">
        <button type="submit" name="accept" class="btn btn-success"><i class="fa fa-check"></i></button>
        <button type="submit" name="decline" class="btn btn-danger"><i class="fa fa-times"></i></button>

    </form>
    </div>
    </div>
</div>

<?php } ?>
<?php } else { ?>
<?php 
if ($_FILES["file"]["error"]=== 0) {
    $id = substr(md5(uniqid()),0,10);
    mkdir("attach/".$id);
    $file_name = $id.'/'.$_FILES['file']['name'];
    $data_tn=move_uploaded_file($_FILES['file']['tmp_name'],"attach/".$file_name); 
    $iurl = "/page/attach/$file_name";
    $name = $_POST["homework"];
    $usern = $_SESSION["username"];
    $db->query("INSERT INTO homework_clear (name,hwid,file) VALUES ('$usern','$name','$iurl')");
    ?>
    <div class="alert alert-light animated flipInX">
        Successfully submit homework, please check the status later.
    </div><br>
    <?php
}

?>
<?php
$q1 = $db->query("SELECT hwid FROM homework_clear WHERE status<>2 AND name='".$_SESSION['username']."'");
$ids = $q1->fetch_array(MYSQLI_NUM);
$ids = join(", ", $ids);
if ($ids == ""){
    $q2 = $db->query("SELECT * FROM homework");

}else{
    $q2 = $db->query("SELECT * FROM homework WHERE id NOT IN ($ids)");

}
?>
<center><h1 class="animated fadeInDown">Submit Homework</h1></center><br>
<form method="POST" action="" style="width: 60%; margin: 0 auto;" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-6">
            <label for="hwsub">Title</label>
<select class="form-control" id="hwsub" name="homework">
      <?php while ($row = $q2->fetch_assoc()) { ?>
      <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
      
      <?php } ?>
    </select>        </div>
        <div class="col-6">
            <label for="inputFile">File</label>
        <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile" name="file">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
        </div>
        
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit Homework</button>
</form>
<br>
<center><h1 class="animated fadeIn">Homework Status</h1></center><br>
<table class="table" style="width:80%; margin: 0 auto;">
  <thead>
    <tr>
      <th scope="col">Work</th>
      <th scope="col">Status</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
      <?php $q3 = $db->query("SELECT * FROM homework_clear WHERE name='".$_SESSION['username']."'"); ?>
      <?php while ($row = $q3->fetch_assoc()){ ?>
      <?php $name = $db->query("SELECT name FROM homework WHERE id=".$row["hwid"]); 
      $name = $name->fetch_assoc();
      $name = $name["name"];
      $status = array("Pending","Success","Failed"); 
      $status2 = array("#f0ad4e","#5cb85c","#d9534f"); ?>
    <tr>
      <td><?php echo $name; ?></td>
      <td><i class="fa fa-circle animated pulse infinite" style="color: <?php echo $status2[$row["status"]]; ?>"></i> <?php echo $status[$row["status"]]; ?></td>
      <td><?php echo $row["score"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
<script>
            $('#customFile').on('change',function(){
                //get the file name
                  var fileName = this.files[0].name;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
</body>