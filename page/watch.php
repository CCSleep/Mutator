<?php session_start();
include "../common/bump.php";
 ?>
<?php
if(isset($_GET['v'])){
$ids = $_GET['v'];
$u = $_SESSION['username'];
include "../common/conn.php";
$q = "SELECT * FROM `videos` WHERE v='$ids'";
$result = $db-> query($q);
$addv = $db->query("UPDATE `videos` SET view_cc=view_cc+1 WHERE v='".$ids."'");

while($row = $result -> fetch_assoc()) { 
$name = $row['name'];
$user = $row['username'];
$url = $row['location'];
$v = $row['v'];
$tn = $row['tn'];
}

?>




<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
<link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.plyr.io/2.0.13/plyr.css" />
<link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/c9d7447664.js"></script>

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<link rel="stylesheet" href="/assets/bootstrap.css" /></script>


<link rel="stylesheet" href="/assets/animate.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdn.plyr.io/3.5.3/plyr.css" />
    <title><?php echo $name." - Mutator"; ?></title>
   
     
<meta property="og:site_name" content="async.asia" />
<meta property="og:title" content="<?php echo $user; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo "https://async.asia/v/".$v; ?>" />
<meta property="og:image" content="<?php echo $tn; ?>" />
<meta property="og:description" content="<?php echo $name; ?>" />
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

.pink {
  color: #FF1493;
}
@media screen and (min-width: 845px) {
 .wrapper {
        width: 90%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-gap: 10%;
    }
}

@media screen and (max-width: 844px) {
 .wrapper {
        width: 90%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 0.2%;
    }
}

</style>
<script src="https://cdn.plyr.io/3.5.3/plyr.js"></script>
 <script>
      document.addEventListener('DOMContentLoaded', () => {
          const player = Plyr.setup('.js-player');
      });
  </script>
</head>
<body>
<?php include "../common/nav.php"; ?>
<br><br>

<div style="display: flex; justify-content: center; width:100%; margin: 0 auto;"><h5 class="pink">Lecture Name: </h5>&nbsp;&nbsp;<h5><?php echo $name; ?></h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="pink">Teacher ID:</h5>&nbsp;&nbsp;<h5><?php echo $user; ?></h5></div>

<?php
/*echo "<br><div align='center' class='animated fadeIn'><h5 style='isolation: isolate;'>Watching <b>".$name."</b> by <b>".$user."</b>.</h5></div>";
echo "<br><center><video src='$url' width='560' height='315' preload controls allowfullscreen class='animated bounceInUp' style='animation-delay: 1s;'></center>";
echo "<br><br><center><span class='animated bounceInUp' style='animation-delay: 1.2s;'><a style='font-weight: bold;' href='https://async.asia/page/user.php?name=".$user."'>".$user."</a></span><span class='animated bounceInUp' style='animation-delay: 1.2s;'>&nbsp;Publish this on ".$time."</span></center>";  
echo '<br><br>';
//echo '<br><br><center><div class="dev"><iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fasync.asia%2Fpage%2Fwatch.php%3Fv%3D'.$ids.'&width=90&layout=button_count&action=like&size=large&share=false&height=21&appId" width="90" height="50" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></div></iframe></center>';
$_GET['v'] = $_GET['v'];
echo '<div class="animated fadeIn delay-2s"><center>';
include 'btn.php';
echo '</center></div>';
echo ' <br><br>';


include 'chat.php';
*/?>
<br>
<div class="wrapper">
<div>
    <div class=""><video id="video" class="js-player" poster="<?php echo $tn; ?>" controls><source src="<?php echo $url; ?>"/></video></div>
<br><br>
</div>

<div class="">
    <h4>More from Teacher <?php echo $user; ?></h4> <br>
    <?php

$q2 = "SELECT * FROM `videos` WHERE username='$user' AND v<>'$ids' LIMIT 5";
$result2 = $db-> query($q2);
while($row2 = $result2 -> fetch_assoc()) { ?>
<div class="item">
    <div class="img">
    <a href="watch.php?v=<?php echo $row2['v'];?>"><img src="<?php echo $row2['tn'];?>"></a>
    </div>
    <b><a href="watch.php?v=<?php echo $row2['v'];?>">Teacher ID: <?php echo $row2['name'];?></b></a>
</div>
<?php } ?>
</div>
</div>
<?php
}

?>
<style>
  
.tin{
isolation: isolate;

}
      
.darkmode--activated p, .darkmode--activated li {
  color: #000;

}

.button {
  isolation: isolate;

}

.darkmode--activated .logo {
  mix-blend-mode: difference;
 
}
    </style>
    <script>
    var options = {
  bottom: '64px', // default: '32px'
  right: 'unset', // default: '32px'
  left: '32px', // default: 'unset'
  time: '5.0s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#fff',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: false, // default: true,
  label: 'TinEIEI', // default: ''
  autoMatchOsTheme: true // default: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();
    </script>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>
<script>
  new Darkmode().showWidget();
</script>

  </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<br><br>

 
  </html>
