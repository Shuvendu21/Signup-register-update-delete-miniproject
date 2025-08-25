<?php
session_start();
require 'dbConnect.php'; // This defines $pdo

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

if (!isset($user['id'])) {
    die("User ID missing from session.");
}

$userId = $user['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        session_destroy();
        header("Location: index.php?message=account_deleted");
        exit();
    } else {
        echo "Error deleting user.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
