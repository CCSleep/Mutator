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
<?php
if (isset($_POST["name"]) && $_SESSION["rank"] == 1){
    $name = $_POST["name"];
    $desc = (isset($_POST["description"])) ? $_POST["description"] : "";
    $points = (isset($_POST["points"])) ? $_POST["points"] : "5";
    if($_FILES['file']['error']!=0){
        $iurl = "null";
    }else{
        //print_r($_FILES['file']);
        //$ext= pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        //echo $ext;
        $id = substr(md5(uniqid()),0,10);
        mkdir("attach/".$id);
        $file_name = $id.'/'.$_FILES['file']['name'];
        $data_tn=move_uploaded_file($_FILES['file']['tmp_name'],"attach/".$file_name); 
        $iurl = "/page/attach/$file_name";
    }
    $db->query("INSERT INTO homework (name,description,file,points) VALUES ('$name','$desc','$iurl',$points)");
    ?>
    <div class="alert alert-light">
        Successfully added assignment <strong><?php echo $name; ?></strong> 
    </div>
    <?php
}
?>

<?php if ($_SESSION["rank"] == 1) { ?>
<br>
<center><h1 class="animated fadeInDown">Add Homework</h1></center><br>
<form method="POST" action="" style="width: 60%; margin: 0 auto;" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-11">
            <label for="inputName">Title</label>
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Title">
        </div>
        <div class="col-1">
            <label for="inputScore">Score</label>
        <input type="number" class="form-control" id="inputScore" name="points" placeholder="5" value="5">
        </div>
        
    </div>
    <div class="form-group">
        <label for="inputDes">Description</label>
        <textarea type="text" class="form-control" id="inputDes" name="description" placeholder="Description" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="inputFile">File</label>
        <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile" name="file">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
    </div>
    <button type="submit" class="btn btn-primary">Add Homework</button>
</form>
<?php } ?>
<br>
<center><h1 class="animated fadeIn">Homeworks</h1></center><br>
<?php
$allq = $db->query("SELECT * FROM homework");
while ($row = $allq->fetch_assoc()){
?>
<div class="card bg-primary text-white" style="width: 75%; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["name"]; ?></h5>
    <p class="card-text"><?php echo ($row["description"] === "") ? "<i>No Description Available</i>" : $row["description"]; ?></p>
    <p class="card-text"><i class="fa fa-star"></i> Points: <?php echo $row["points"]; ?></p>
    <?php if ($row["file"] === "null") {} else { echo "<a href='".$row["file"]."' class='btn btn-success' download>Download File</a>";} ?>
  </div>
</div>
<br>
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

