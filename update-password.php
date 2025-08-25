<?php
session_start();
require 'dbConnect.php';

if (!isset($_SESSION['recover_user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $userId = $_SESSION['recover_user_id'];

    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    if ($stmt->execute([$newPassword, $userId])) {
        unset($_SESSION['recover_user_id']);
        header("Location: index.php?message=password_updated");
        exit();
    } else {
        echo "Failed to update password. Please try again.";
    }
}
?>
