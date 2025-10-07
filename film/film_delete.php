<?php
include '../includes/config.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM film WHERE id_film=$id");
header("Location: daftar.php");
?>