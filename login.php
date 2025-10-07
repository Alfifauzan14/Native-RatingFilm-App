<?php
include 'includes/config.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'")
  );

  if ($user) {
    $_SESSION['user_id']   = $user['id_user'];
    $_SESSION['user_nama'] = $user['nama'];
    header("Location: index.php");
  } else {
    echo "Email atau password salah";
  }
}

?>
<div class="login-card">
  <div class="avatar"></div>
  <form method="post" class="login-form">
    <div class="input-group">
      <label for="email">Email :</label>
      <input type="email" name="email" required>
    </div>
    <div class="input-group">
      <label for="password">Password :</label>
      <input type="password" name="password" required>
    </div>
    <div>
      <input type="submit" name="submit" value="Login" class="btn-login">
    </div>
  </form>
  <a href="register.php" class="register-link">Register</a>
</div>
<link rel="stylesheet" href="css/auth.css">