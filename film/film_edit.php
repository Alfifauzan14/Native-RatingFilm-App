<?php
include '../includes/config.php';

$id = $_GET['id'];
$film = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM film WHERE id_film=$id"));

if (isset($_POST['submit'])) {
  $judul = $_POST['judul'];
  $genre = $_POST['genre'];
  $tahun = $_POST['tahun'];
  $deskripsi = $_POST['deskripsi'];
  $poster = $_FILES['poster']['name'];

  if ($poster) {
    move_uploaded_file($_FILES['poster']['tmp_name'], '../uploads/' . $poster);
    mysqli_query($conn, "UPDATE film SET 
            judul='$judul', 
            genre='$genre', 
            tahun='$tahun', 
            deskripsi='$deskripsi', 
            poster='$poster' 
            WHERE id_film=$id");
  } else {
    mysqli_query($conn, "UPDATE film SET 
            judul='$judul', 
            genre='$genre', 
            tahun='$tahun', 
            deskripsi='$deskripsi' 
            WHERE id_film=$id");
  }

  header("Location: daftar.php");
}

?>
<form method="post" enctype="multipart/form-data" class="film-form">
  <div>
    <label for="judul">Judul :</label>
    <input type="text" name="judul" value="<?= $film['judul'] ?>" required>
  </div>
  <div>
    <label for="genre">Genre :</label>
    <input type="text" name="genre" value="<?= $film['genre'] ?>" required>
  </div>
  <div>
    <label for="tahun">Tahun :</label>
    <input type="number" name="tahun" value="<?= $film['tahun'] ?>" required>
  </div>
  <div>
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi"><?= $film['deskripsi'] ?></textarea>
  </div>
  <div>
    <label for="poster">Poster</label>
    <input type="file" name="poster">
  </div>
  <div>
    <p>Poster lama:</p>
    <img src="../uploads/<?= $film['poster'] ?>" width="120" class="poster-preview">
  </div>
  <div>
    <button type="submit" name="submit" class="btn-update">Update Film</button>
  </div>
  <a href="daftar.php" class="register-link">⬅ Kembali ke daftar</a>
</form>
<link rel="stylesheet" href="../css/app.css">