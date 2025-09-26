<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Film</title>
  <link rel="stylesheet" href="app.css">
</head>

<body>
  <div class="app-container">
    <header>
      <h1>🎬 Daftar Film</h1>
      <nav>
        <a href="film_add.php" class="btn">Tambah Film</a>
        <a href="logout.php" class="btn logout">Logout</a>
      </nav>
    </header>

    <table class="film-table">
      <thead>
        <tr>
          <!-- <th>ID</th> -->
          <th>Judul</th>
          <th>Genre</th>
          <th>Tahun</th>
          <th>Deskripsi</th>
          <th>Poster</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM film");
        while ($film = mysqli_fetch_assoc($data)) {
        ?>
          <tr>
            <td><?php echo $film['judul'] ?></td>
            <td><?php echo $film['genre'] ?></td>
            <td><?php echo $film['tahun'] ?></td>
            <td><?php echo $film['deskripsi'] ?></td>
            <td><img src="uploads/<?= $film['poster'] ?>" width="60"></td>
            <td>
              <a href="detail.php?id=<?= $film['id_film'] ?>" class="aksi detail">Detail</a>
              <a href="film_edit.php?id=<?= $film['id_film'] ?>" class="aksi edit">Edit</a>
              <a href="film_delete.php?id=<?= $film['id_film'] ?>" class="aksi hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>