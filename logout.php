<?php include '_header.php' ?>

<p>Logged Out! Redirecting...</p>

<?php
$_SESSION["uid"] = "";
$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : "index.php";
echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
?>




<?php include '_footer.php' ?>
