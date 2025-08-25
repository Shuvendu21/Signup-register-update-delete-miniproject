<?php
session_start();
if (!isset($_SESSION['recover_user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2 class="form-title">Reset Your Password</h2>
    <form method="POST" action="update-password.php">
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="new_password" placeholder="New Password" required>
      </div>
      <input type="submit" class="btn" value="Update Password">
    </form>
  </div>
</body>
</html>
