<?php require_once('header.php'); ?>
<?php
session_start();
session_unset();
header('Location: index.php');
exit;
?>
<?php require_once('footer.php'); ?>
