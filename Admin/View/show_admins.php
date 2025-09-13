<?php
session_start();
require_once("../Control/authCheck.php");
checkLoggedIn();

// Include the database connection
require_once("../Model/db.php");
$db = new myDB();
$connectionObject = $db->openCon();

// Fetch all clients
$admins = $db->getAlladmin($connectionObject);

$db->closeCon($connectionObject);
?>

<html>
<head>
    <title>Show admins</title>
    <link rel="stylesheet" href="../CSS/userprofil.css"> <!-- External CSS -->
</head>
<body>

<section>
    <h2 style="text-align: center;">Current Admins</h2> <!-- Centered Heading -->
    <?php if (!empty($admins)): ?>
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($admin['username']); ?></td>
                            <td><?php echo htmlspecialchars($admin['email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>No admins found.</p>
    <?php endif; ?>
    <!-- Back Button Below the Table -->
    <div style="text-align: center; margin-top: 20px;">
        <button onclick="goBack()">Back to Dashboard</button>
    </div>
</section>

<!-- JavaScript for Back Button -->
<script>
    function goBack() {
        window.location.href = 'admin_dashboard.php'; // Redirect to the dashboard
    }
</script>
</body>
</html>