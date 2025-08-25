<?php

session_start();
if (isset($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container" id="signIn">
    <h1 class="form-title"><img src="images/college-logo.png" alt="College Logo" width="150"><br>Sign In</h1>
    <?php
    if (isset($errors['login'])) {
      echo '<div class="error-main">
                    <p>' . $errors['login'] . '</p>
                    </div>';
      unset($errors['login']);
    }
    ?>
    <form method="POST" action="user-account.php">
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <?php
        if (isset($errors['email'])) {
          echo ' <div class="error">
                    <p>' . $errors['email'] . '</p>
                </div>';
        }
        ?>
      </div>
      <div class="input-group password">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i id="eye" class="fa fa-eye"></i>
        <?php
        if (isset($errors['password'])) {
          echo ' <div class="error">
                    <p>' . $errors['password'] . '</p>
                </div>';
        }
        ?>
      </div>
      <p class="recover">
        <a href="#">Recover Password</a>
      </p>
      <input type="submit" class="btn" value="Sign In" name="signin">
    </form>
    <!-- Password Recovery Toggle -->
<div class="recover-form" style="display:none; margin-top: 1rem;">
  <form method="POST" action="recover-step1.php">
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" placeholder="Enter your registered email" required>
    </div>
    <div class="input-group">
      <i class="fas fa-calendar"></i>
      <input type="date" name="created_at" required>
    </div>
    <input type="submit" class="btn" value="Verify Account">
  </form>
</div>

<script>
  document.querySelector(".recover a").addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelector(".recover-form").style.display = "block";
  });
</script>
    <p class="or" >
            COURSE CODE : <span style="color: #ff3b3bff; font-weight: bold;">BCI2323</span>
        </p>
    <div class="icons">
      <i class="fab fa-google"></i>
      <i class="fab fa-facebook"></i>
    </div>
    <div class="links">
      <p>Don't have account yet?</p>
      <a href="register.php">Sign Up</a>
    </div>
  </div>
  <script src="script.js"></script>
 <?php
// Success messages
if (isset($_GET['message']) && $_GET['message'] === 'password_updated') {
  echo '<div id="customAlert" style="position:fixed;top:20px;left:50%;transform:translateX(-50%);background-color:#28a745;color:white;padding:15px 25px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);font-weight:bold;z-index:9999;">Password updated successfully. Please log in.</div>
  <script>
    setTimeout(() => {
      document.getElementById("customAlert").style.display = "none";
    }, 4000);
  </script>';
}

// ❌ Recovery failed message
if (isset($_GET['recovery_error']) && $_GET['recovery_error'] === 'not_matched') {
  echo '<div id="customAlert" style="position:fixed;top:60px;left:50%;transform:translateX(-50%);background-color:#dc3545;color:white;padding:15px 25px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);font-weight:bold;z-index:9999;">Email and Date do not match any records.</div>
  <script>
    setTimeout(() => {
      document.getElementById("customAlert").style.display = "none";
    }, 4000);
  </script>';
}
?>
  <?php
if (isset($_GET['message']) && $_GET['message'] === 'account_deleted') {
  echo '<div id="customAlert" style="
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #d32f2f;
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    font-weight: bold;
    z-index: 9999;
    display: none;
  ">Your profile has been deleted successfully.</div>

  <script>
    const alertBox = document.getElementById("customAlert");
    alertBox.style.display = "block";
    setTimeout(() => {
      alertBox.style.display = "none";
    }, 4000); // Hide after 4 seconds
  </script>';
}
?>
</body>
</html>
<?php
if (isset($_SESSION['errors'])) {
  unset($_SESSION['errors']);
}
?>