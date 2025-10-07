<?php
include '../includes/config.php';

$id = $_GET['id'];
$film = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM film WHERE id_film=$id"));
$ratings = mysqli_query($conn, "SELECT r.*, u.nama FROM rating r JOIN user u ON r.id_user=u.id_user WHERE r.id_film=$id");
?>
<div class="film-detail">
  <h2 class="film-title"><?= $film['judul'] ?></h2>
  <p class="film-meta"><?= $film['genre'] ?> | <?= $film['tahun'] ?></p>
  <img src="../uploads/<?= $film['poster'] ?>" class="film-poster">
  <p class="film-title"><?= $film['deskripsi'] ?></p>

  <h3 class="rating-title">Rating</h3>
  <div class="rating-list">
    <?php while ($r = mysqli_fetch_assoc($ratings)) { ?>
      <div class="rating-item">
        <strong><?= $r['nama'] ?></strong>:
        <span class="star"><?= str_repeat("⭐", $r['nilai']) ?></span>
        <p><?= $r['komentar'] ?></p>
      </div>
    <?php } ?>
  </div>

  <?php
  if (isset($_SESSION['user_id'])) { 
  ?>
    <form method="post" action="rating_add.php" class="rating-form">
      <div>
        <input type="hidden" name="id_film" value="<?= $film['id_film'] ?>">
        <label>Nilai (1-5):</label>
      </div>
      <div>
        <input type="number" name="nilai" min="1" max="5" required>
        <label>Komentar:</label>
      </div>
      <div>
        <textarea name="komentar"></textarea>
        <button type="submit" name="submit" class="btn-submit">Kirim Rating</button>
      </div>
    </form>
  <?php 
  } else { 
  ?>
    <p class="login-reminder">Login dulu untuk beri rating</p>
  <?php 
  } 
  ?>
  <a href="daftar.php" class="register-link">⬅ Kembali ke daftar</a>
</div>
<link rel="stylesheet" href="../css/app.css">