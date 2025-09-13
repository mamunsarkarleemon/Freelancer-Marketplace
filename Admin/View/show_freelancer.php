<?php
session_start();
require_once("../Control/authCheck.php");
checkLoggedIn();

// Include the database connection
require_once("../Model/db.php");
$db = new myDB();
$connectionObject = $db->openCon();

// Fetch all freelancers
$freelancers = $db->getAllfreelancer($connectionObject);

$db->closeCon($connectionObject);
?>

<html>
<head>
    <title>Show Freelancers</title>
    <link rel="stylesheet" href="../CSS/userprofil.css"> <!-- External CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<nav align="right">
    <a href="admin_dashboard.php">Home</a> |
    <a href="profile.php">Profile</a> |
    <a href="inbox.php">Message</a> |
    <a href="settings.php">Settings</a> |
    <a href="../Control/logoutCheck.php">Logout</a>
</nav>

<section>
    <h2>Current Freelancers</h2>
    
    <!-- Create Freelancer Form -->
    <form id="createFreelancerForm">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Add Freelancer</button>
    </form>

    <div id="message"></div> <!-- Display messages -->

    <button onclick="goBack()" style="margin-bottom: 20px;">Back to Dashboard</button>

    <?php if (!empty($freelancers)): ?>
        <div class="freelancer-table">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        =
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($freelancers as $freelancer): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($freelancer['username']); ?></td>
                            <td><?php echo htmlspecialchars($freelancer['email']); ?></td>
                            <td>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>No freelancers found.</p>
    <?php endif; ?>
</section>

<script>
    function goBack() {
        window.location.href = 'admin_dashboard.php';
    }

    // Create Freelancer AJAX
    $("#createFreelancerForm").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: "../Control/create_freelancer.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#message").html(response);
                location.reload(); // Refresh after adding
            }
        });
    });

    // Delete Freelancer AJAX
    $(".deleteBtn").on("click", function() {
        let freelancerId = $(this).data("id");
        $.ajax({
            url: "../Control/delete_freelancer.php",
            type: "POST",
            data: { id: freelancerId },
            success: function(response) {
                $("#message").html(response);
                location.reload(); // Refresh after deleting
            }
        });
    });
</script>

</body>
</html>
