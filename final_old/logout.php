<?php
SESSION_START();
unset($_SESSION['username'], $_SESSION['password']);
header ( 'Location:index.php' );	
@ldap_close($ldap);
?>
<h1> Logout </h1>