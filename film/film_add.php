<?php
include '../includes/config.php';

if (isset($_POST['submit'])) {
  $judul     = $_POST['judul'];
  $genre     = $_POST['genre'];
  $tahun     = $_POST['tahun'];
  $deskripsi = $_POST['deskripsi'];

  $posterName = $_FILES['poster']['name'];
  $tmpName    = $_FILES['poster']['tmp_name'];

  $newName = time() . "_" . $posterName;

  move_uploaded_file($tmpName, '../uploads/' . $newName);

  mysqli_query($conn, "INSERT INTO film (judul, genre, tahun, deskripsi, poster) 
                        VALUES ('$judul', '$genre', '$tahun', '$deskripsi', '$newName')");

  header("Location: daftar.php");
  exit;
}
?>
<div class="app-container">
  <form method="post" enctype="multipart/form-data" class="film-form">
    <h2>Tambah Film</h2>
    <div class="input-group">
      <label for="judul">Judul :</label>
      <input type="text" name="judul" required>
    </div>
    <div class="input-group">
      <label for="genre">Genre :</label>
      <input type="text" name="genre" required>
    </div>
    <div class="input-group">
      <label for="tahun">Tahun :</label>
      <input type="number" name="tahun" required>
    </div>
    <div class="input-group">
      <label for="deskripsi">Deskripsi :</label>
      <textarea name="deskripsi" rows="4"></textarea>
    </div>
    <div class="input-group">
      <label for="poster">Poster :</label>
      <input type="file" name="poster" required>
    </div>
    <button type="submit" name="submit" class="btn-submit">Tambah Film</button>
    <a href="daftar.php" class="register-link">⬅ Kembali ke daftar</a>
  </form>
</div>
<link rel="stylesheet" href="../css/app.css">