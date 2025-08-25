<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];

}else{
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style-profile.css">
    <link rel="stylesheet" href="style-profile1.css">
</head>
<body>

<div class="dashboard-container">
    <h2>Welcome, <?php echo $user['name']; ?>!</h2>

    <div class="user-info">
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    </div>

    <div class="dashboard-buttons">
        <button onclick="document.getElementById('updateForm').style.display='block'">Update My Profile</button>
        <button onclick="openModal()">See My Profile</button>
        <button onclick="confirmDelete()">Delete My Profile</button>
    </div>

    <!-- Hidden Update Form -->
    <div class="update-form" id="updateForm">
        <h3>Update Profile</h3>
        <form method="POST" action="update-profile.php">
            <input type="text" name="name" placeholder="Enter new name" required>
            <input type="email" name="email" placeholder="Enter new email" required>
            <input type="password" name="password" placeholder="New Password (optional)">
            <input type="submit" value="Update">
        </form>
    </div>

    <a href="logout.php" class="logout-link">Logout</a>
</div>

<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete your profile? This action cannot be undone.")) {
            window.location.href = 'delete.php'; // Replace with your actual deletion script
        }
    }
</script>
<script>
function openModal() {
  document.getElementById('profileModal').style.display = "block";
}

function closeModal() {
  document.getElementById('profileModal').style.display = "none";
}

// Close modal if clicked outside
window.onclick = function(event) {
  const modal = document.getElementById('profileModal');
  if (event.target === modal) {
    modal.style.display = "none";
  }
}
</script>

<?php
if (isset($_GET['update']) && $_GET['update'] === 'success') {
  echo '<div id="customAlert" style="
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #48d32fff;
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(9, 91, 121, 0.2);
    font-weight: bold;
    z-index: 9999;
    display: none;
  ">Your profile has been Updated successfully.</div>

  <script>
    const alertBox = document.getElementById("customAlert");
    alertBox.style.display = "block";
    setTimeout(() => {
      alertBox.style.display = "none";
    }, 4000); // Hide after 4 seconds
  </script>';
}
?>
<!-- Profile Modal -->
<div id="profileModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>Your Profile Details</h2>
    <div class="profile-info">
      <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
      <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
      <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
      <p><strong>Created At:</strong> <?php echo $user['created_at']; ?></p>
    </div>
  </div>
</div>

</body>
</html>
