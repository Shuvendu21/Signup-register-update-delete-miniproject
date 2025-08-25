<?php
session_start();
require 'dbConnect.php'; // your DB connection file

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
$userId = $user['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

try {
    if (!empty($password)) {
        // If password is provided, update all fields including password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute([$name, $email, $hashedPassword, $userId]);
    } else {
        // Update without changing password
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $userId]);
    }

    // Update session info
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;

    // Redirect back to dashboard with success message
    header("Location: home.php?update=success");
    exit();

} catch (PDOException $e) {
    echo "Error updating profile: " . $e->getMessage();
}
?>
