<?php require_once('header.php') ?>
<?php require_once('../php/functions.php') ?>
<?php

$con = getConnection();
$isbn = $_GET['isbn'];
$title = $_GET['title'];
$author = $_GET['author'];
$publisher = $_GET['publisher'];
$query = "INSERT IGNORE INTO book(isbn13, titel, autor, verlag) VALUES ('$isbn', '$title', '$author', '$publisher')";
mysqli_query($con, $query);

?>

<?php require_once('footer.php') ?>
