<?php
session_start();
if($_GET['do']=='logout'){
	session_unset();
	session_destroy();
}
if (!$_SESSION['admin']){
header("Location:index.php");
exit;
}
?>