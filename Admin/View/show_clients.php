<?php
session_start();
require_once("../Control/authCheck.php");
checkLoggedIn();

// Include the database connection
require_once("../Model/db.php");
$db = new myDB();
$connectionObject = $db->openCon();

// Fetch all clients
$clients = $db->getAllClients($connectionObject);

$db->closeCon($connectionObject);
?>

<html>
<head>
    <title>Show Clients</title>
    <link rel="stylesheet" href="../CSS/userprofil.css"> <!-- External CSS -->
</head>
<body>


<section>
    <h2 style="text-align: center;">Current Clients</h2>

    <!-- Create Client Button -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="create_client.php"><button>Add New Client</button></a>
    </div>

    <?php if (!empty($clients)): ?>
        <div class="client-table">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>userType</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($client['username']); ?></td>
                            <td><?php echo htmlspecialchars($client['email']); ?></td>
                            <td><?php echo htmlspecialchars($client['userType']); ?></td>
                            <td>
                                <form action="../Control/delete_client.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $client['user_id']; ?>">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this client?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>No clients found.</p>
    <?php endif; ?>

    <!-- Back Button -->
    <div style="text-align: center; margin-top: 20px;">
        <button onclick="goBack()">Back to Dashboard</button>
    </div>
</section>

<script>
    function goBack() {
        window.location.href = 'admin_dashboard.php';
    }
</script>

</body>
</html>
