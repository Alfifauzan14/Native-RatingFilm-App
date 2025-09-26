<?php
include 'config.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM film WHERE id_film=$id");
header("Location: index.php");
?>