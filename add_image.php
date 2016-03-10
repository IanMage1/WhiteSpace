<?php include("_header.php");?>
<h1>Add Image</h1>
<?php

$dir = "Logos";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["myfile"])) {
  $errorinfo = $_FILES["myfile"]["error"];
  $tmpfile = $_FILES["myfile"]["tmp_name"];
  $filesize = $_FILES["myfile"]["size"];
  $filetype = $_FILES["myfile"]["type"];
  $size = getimagesize($tmpfile);
  $width = $size[0];
  $height = $size[1];
  $answer = $_POST["answer"];

  if ($filetype == "image/jpeg" && $filesize < 1048576) {
    if ($stmt = $mysqli->prepare("insert into images (name,address,width,height,xtiles,ytiles) values(?,?,?,?,?,?)")) {
      if ($countget = $mysqli->prepare("select max(iid) from images;")){
        $countget->execute();
        $countget->bind_result($count);
        $countget->fetch();
        $countget->close();
      }
      $imagenum = $count + 1;
      $filename = "image" . "$imagenum" . ".jpg";
      $address = "$dir/$filename";
      $xtiles = 20;
      $ytiles = 20;
      $stmt->bind_param("ssiiii",$answer,$address,$width,$height,$xtiles,$ytiles);
      $stmt->execute();
      $stmt->close();
    }
    move_uploaded_file($tmpfile,"$address");
    chmod("$address", 0644);
    echo "Successfully uploaded \"$answer\" as $filename";
  } else 
    echo "Please upload a JPEG under 1MB in size";
}
?>

<?php if (!(checkAuth(false) == "")) { ?>
<form method="post" action=""
enctype="multipart/form-data">
<li>Choose file: <input type="file" name="myfile">
<li><label>Answer: </label><input type="text" name="answer">
<li><input type="submit" value="Upload">
</form>
<?php } else {
$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : "login.php";
echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
} ?>

<?php include("_footer.php");?>

