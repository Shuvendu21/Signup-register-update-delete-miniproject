<?php
require 'dbConnect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $created_at = $_POST['created_at'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND DATE(created_at) = ?");
    $stmt->execute([$email, $created_at]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['recover_user_id'] = $user['id'];
        header("Location: reset-password.php");
        exit();
    } else {
        $_SESSION['recover_error'] = "Email and creation date do not match.";
        header("Location: index.php?recovery_error=not_matched");
        exit();
    }
}
?>
