<nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index:999;">
  <a class="navbar-brand animated fadeInLeft" href="#">
    <img src="/assets/logo.png" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active animated fadeIn">
        <a class="nav-link" href="portal.php"><i class="fa fa-home"></i> Lobby <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active animated fadeIn">
        <a class="nav-link" href="announce.php"><i class="fa fa-sticky-note"></i> Announcement </a>
      </li>
      <li class="nav-item active animated fadeIn">
        <a class="nav-link" href="homework.php"><i class="fa fa-clipboard"></i> Assignments </a>
      </li>
      <li class="nav-item active animated fadeIn">
        <a class="nav-link" href="hwstatus.php"><i class="fa fa-send"></i> Submit </a>
      </li>
      <li class="nav-item dropdown active animated fadeIn">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-file-video-o"></i> Video
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 2;">
          <a class="nav-link" href="mainvid.php"><i class="fa fa-file-video-o"></i> Class Video </a>
          <div class="dropdown-divider"></div>
          <?php if ($_SESSION["rank"] == 1) { ?>
          <a class="nav-link" href="upload.php"><i class="fa fa-upload"></i> Upload Video </a>
          <?php } ?>
        </div>
      </li>

      <?php if ($_SESSION["rank"] == 1) { ?>
      <li class="nav-item dropdown active animated fadeIn">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-shield"></i> Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2" style="z-index: 2;">
          <a class="nav-link" href="admin.php"><i class="fa fa-shield"></i> Panel </a>
          <a class="nav-link" href="admin.student.php"><i class="fa fa-user-o"></i> Students </a>
        </div>
      </li>
      <li class="nav-item active animated fadeIn">
        
      </li>
    <?php } ?>
    <li class="nav-item active animated fadeIn">
        <a class="nav-link" href="zoom.php"><i class="fa fa-video-camera"></i> Live Learning </a>
      </li>
   </ul>
   <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active animated fadeIn">
        <p style="margin-top: 20px;"><i class="fa fa-user"></i> <?php echo $_SESSION["username"]; ?></p>
      </li>
    &nbsp;&nbsp; 
      <li class="nav-item active animated fadeIn">
        <a style="margin-top: 16px;" class="nav-link" href="javascript:pernyrengolink('/logout.php','ต้องการออกจากระบบใช่หรือไม่','info')"><i class="fa fa-sign-out"></i></a>
      </li>
    &nbsp;&nbsp;
    <li class="nav-item active animated fadeInRight" >
        <p style="margin-top: 2px;" id="date"></p> <div class="time" style="margin-top: -8px;"><p id="time" style="color: #FF1493;"></p></div>
      </li>

   </ul>
    </div>
  </div>
</nav>
<script>

var print1="";
var print2="";
var print3="";
var today = new Date();
var weekday = today.getDay();
if (weekday == 6) print1='วันเสาร์ที่';
if (weekday == 0) print1='วันอาทิตย์ที่';
if (weekday == 1) print1='วันจันทร์ที่';
if (weekday == 2) print1='วันอังคารที่';
if (weekday == 3) print1='วันพุธที่';
if (weekday == 4) print1='วันพฤหัสบดีที่';
if (weekday == 5) print1='วันศุกร์ที่';
month = today.getMonth();
if (month == 0) print2='มกราคม';
if (month == 1) print2='กุมภาพันธ์';
if (month == 2) print2='มีนาคม';
if (month == 3) print2='เมษายน';
if (month == 4) print2='พฤษภาคม';
if (month == 5) print2='มิถุนายน';
if (month == 6) print2='กรกฎาคม';
if (month == 7) print2='สิงหาคม';
if (month == 8) print2='กันยายน';
if (month == 9) print2='ตุลาคม';
if (month == 10) print2='พฤศจิกายน';
if (month == 11) print2='ธันวาคม';
date = today.getDate();
year=today.getFullYear() + 543; 
document.getElementById("date").innerHTML = print1 + ' ' + date +  ' ' +  print2 + ' ' + year;
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  h = checkTime(h);
  m = checkTime(m);
  document.getElementById('time').innerHTML =
  '<i class="fa fa-clock-o"></i>&nbsp;' + h + ":" + m;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
startTime();
</script>