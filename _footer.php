<?php
if (!(checkAuth(false) == "")) {
?>
<p><?php echo checkAuth(false) ?> Logged In</p>
<?php } 
?>
</main></body></html>
<?php mysqli_close($mysqli); ?>
