<?php
include '../includes/config.php';

if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
  $id_film = $_POST['id_film'];
  $id_user = $_SESSION['user_id'];
  $nilai = $_POST['nilai'];
  $komentar = $_POST['komentar'];

  mysqli_query($conn, "INSERT INTO rating (id_film, id_user, nilai, komentar) 
                        VALUES ($id_film, $id_user, $nilai, '$komentar')");
  header("Location: detail.php?id=$id_film");
}
?>