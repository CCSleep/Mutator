<?php 
session_start();
include "../common/conn.php";
include "../common/adminbump.php";
include "../common/bump.php";



?>

<!DOCTYPE html>
<html>
    
<head>
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<link rel="stylesheet" href="/assets/bootstrap.css" /></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/c9d7447664.js"></script>
<link rel="stylesheet" href="/assets/animate.css" /></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

	<title>Upload - Mutator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
  * { font-family: Kanit; }
</style>
<body>
<?php include "../common/nav.php"; ?>

<br><br>
<div class="animated fadeInDown"><center><h1>Upload</h1></center></div>
<br><br>
<form action="" method="POST" enctype="multipart/form" style="animation-delay: 1s; background-color: #EEEEEE;" class="form-row align-items-center animated bounceInUp">
<div class="col-md-4"></div>
<div class="col-md-4">
<br>
<!-- <label for="Name">Name</label>
<input type="text" name="name" placeholder="Name" class="form-control">
<br>
<label for="file">Upload Video</label>
<div class="custom-file">
  <input type="file" class="custom-file-input" id="inputGroupFile01" accept="video/*">
    <label class="custom-file-label" for="inputGroupFile01">Choose video</label>
<br><br>
<center><button class="btn btn-block btn-primary" type="submit" name="upload">Upload!</button></center>
-->
<a href="?add" class="btn btn-block btn-primary">เพิ่มการดาวน์โหลด</a>
<br>

</form>

    <?php
if(isset($_GET["add"])){
if(isset($_POST["name"])){
$name=$_POST["name"];
$user=$_SESSION["username"];
$ext = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
$id = substr(md5(uniqid()),0,10);
$unique_name = $id.'.'.$ext;
$data_video=move_uploaded_file($_FILES['video']['tmp_name'],"embed/".$unique_name); 
$url = "/page/embed/$unique_name";


if($_FILES['img']['error']!=0){
	$iurl = "/page/thumbnail/tmp.png";
}else{
    $iext= pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $img_name = $id.'.'.$iext;
    $data_tn=move_uploaded_file($_FILES['img']['tmp_name'],"thumbnail/".$img_name); 
    $iurl = "/page/thumbnail/$img_name";
}
mysqli_query($db,"INSERT INTO videos (name,location,username,v,tn) VALUES ('$name','$url','$user','$id','$iurl')");
if($data_video==1){
	echo "Sucessfully Uploaded, you can watch at <a href='/page/watch.php?v=$id'>/page/watch.php?v=$id</a>";
	//echo $name." ".$url." ".$user." ".$id." ".$iurl;
	}else{
	echo "Error! Please try again";
		}
}
?>

<?php
/*session_start();  
// ตรวจสอบเมื่อกดปุ่ม และเมื่อส่งค่า  g-recaptcha-response มาตรวจสอบ
if(isset($_POST['submit']) && isset($_POST['g-recaptcha-response'])){
    $recaptcha_secret = "6LejlMYUAAAAAOwVpQtcm_9_fYjGRz3mWzqncWS9";
    $recaptcha_response = trim($_POST['g-recaptcha-response']);
    $recaptcha_remote_ip = $_SERVER['REMOTE_ADDR'];
     
    $recaptcha_api = "https://www.google.com/recaptcha/api/siteverify?".
        http_build_query(array(
            'secret'=>$recaptcha_secret,
            'response'=>$recaptcha_response,
            'remoteip'=>$recaptcha_remote_ip
        )
    );
    $response=json_decode(file_get_contents($recaptcha_api), true);        
/*  echo "<pre>";
    print_r($response);
    echo "</pre>";    
}*/

?>



<form method="post" action="" enctype="multipart/form-data">
            <br>
          <span>Video<br><div class="file-upload-wrapper">
  <input type="file" name="video" id="input-file-now" class="file-upload" accept="video/*"/>
</div></span>
<br>
<span>Thumbnail<br><div class="file-upload-wrapper">
  <input type="file" name="img" id="input-file-now" class="file-upload" accept="image/*"/>
</div></span>
          <br>
          <span>Name<input type="text" name="name" class="form-control"></span>
          <br>
          <span>Username<input type="text" name="username" class="form-control" disabled value="<?php echo $_SESSION['username']; ?>"></span>
          <!--<script>
          function makeaction(){
                document.getElementById('submit').disabled = false;  
          }
          </script>
          <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6LejlMYUAAAAAFugsWJS1Nx9YiWZqz9QB4x6i4T1"></div>
          <span>-->
          <hr>
          <div>
              <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Upload Link</button>
          </div>
          <hr><br>
          
          </form>
 <?php } ?>
</div>
</body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

</html>