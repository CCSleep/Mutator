<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<br>
<center><h1>Check ประกาศเกียรติคุณ</h1><br>
<form method="post" autocomplete="off" enctype="multipart/form-data" style="display: flex; width: 60%;"><input type="text" name="id" class="form-control" placeholder="Student ID"><div style="margin-left: auto;"><button class="btn btn-success" type="submit" >Check</button></div></form>
</center>
<title>~ เช็คประกาศเกียรติคุณ ~ misaku.CC</title>
<br>
<?php
if (isset($_POST["id"])) {
$id = $_POST["id"];
$get_data = file_get_contents('https://misaku.cc/api/sktmp/'.$id);
$res = json_decode(json_encode(json_decode($get_data)), true);
if ($res['errortype'] === "e_no_award"){?>
    <script>Swal.fire('Error!','ไม่ได้รับรางวัลครับ','error');</script>
<?php } elseif ($res['errortype'] === "e_invalid_stid") {?>
    <script>Swal.fire('Error!','กรอกรหัสประจำตัวไม่ถูกต้องครับ','error');</script>
<?php } else { ?>
    <script>Swal.fire('Success','ได้รับรางวัลครับ','success');</script>
<?php
$data = $res["data"];
$name = $data["name"];
$class = $data["class"];
$stid = $data["id"];
$awards = $data["awards"];
echo "<div class='info' style='font-size: 20px;' align='center'>";
echo "ชื่อ-นามสกุล: ".$name;
echo "<br>";
echo "รหัสประจำตัว: ".$stid;
echo "<br>";
echo "ระดับชั้น: ".$class;
echo "<br></div>";
?>
<br><br>
<table class="table table-dark" style='width: 90%;' align="center">
  <thead>
    <tr>
      <th scope="col">ลำดับที่ประกาศ</th>
      <th scope="col">ชื่อรางวัล</th>
      <th scope="col">ประเภท</th>
    </tr>
  </thead>
  <tbody>
      
<?php
foreach ($awards as &$aw){
    ?>
    <tr>
      <td><?php echo $aw['place']; ?></td>
      <td><?php echo $aw['award']; ?></td>
      <td><?php echo $aw['type']; ?></td>
    </tr>
    <?php
}
?>
</tbody>
</table>
<?php
}
}
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

