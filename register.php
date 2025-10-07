<?php
include 'includes/config.php';

if (isset($_POST['submit'])) {
  mysqli_query($conn, "INSERT INTO user (nama,email,password) 
              VALUES (
                '" . $nama = $_POST['nama'] . "',
                '" . $email = $_POST['email'] . "',
                '" . $password = $_POST['password'] . "'
              )");
  header("Location: login.php");
}
?>
<div class="login-card">
  <div class="avatar"></div>
  <form method="post" class="login-form">
    <div class="input-group">
      <label for="nama">Nama :</label>
      <input type="text" name="nama" required>
    </div>
    <div class="input-group">
      <label for="email">Email :</label>
      <input type="email" name="email" required>
    </div>
    <div class="input-group">
      <label for="password">Password :</label>
      <input type="password" name="password" required>
    </div>
    <div>
      <input type="submit" name="submit" value="Register" class="btn-login">
    </div>
  </form>
  <a href="login.php" class="register-link">Sudah punya akun? Login</a>
</div>
<link rel="stylesheet" href="css/auth.css">