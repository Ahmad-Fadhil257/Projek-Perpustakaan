<?php
$login_error = "";

// Cek apakah form sudah dikirim
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === 'Raiden' && $password === '12345') {
    header('Location: dashboard.php');
    exit();
  } else {
    $login_error = "Login gagal. Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Perpustakaan</title>
  <link rel="stylesheet" href="./asset/css/login.css">
</head>
<body>

  <div class="login-box">
    <div class="login-logo">
      Login Admin Perpustakaan
    </div>

    <form action="" method="post">
      <div class="input-group">
        <input type="text" name="username" placeholder="Nama" required>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="input-group">
        <button type="submit">Sign In</button>
      </div>
    </form>

    <?php 
    if ($login_error): ?>
      <p style="color: red; text-align: center; margin-top: 1rem;">
        <?= $login_error ?>
      </p>
    <?php endif; ?>
  </div>
</body>
</html>
