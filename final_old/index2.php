<?php
SESSION_START();
if(empty($_SESSION['username'])||empty($_SESSION['password'])){
    header ( 'Location:index.php' );
}
?>
<form action="logout.php" method="post" style="rein">
	<button type="submit" name="anlegen">Logout</button>
</form>