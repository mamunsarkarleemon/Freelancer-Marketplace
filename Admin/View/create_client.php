<?php
session_start();
require_once("../Control/authCheck.php");
checkLoggedIn();

// Include the database connection
require_once("../Model/db.php");

$db = new myDB();
$connectionObject = $db->openCon();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $userType = "client"; // Fixed user type for clients

    if (!empty($username) && !empty($password) && !empty($email)) {
        $result = $db->insertUser($connectionObject, $username, $password, $email, $userType);
        if ($result) {
            $message = "Client successfully added!";
        } else {
            $message = "Error: Username already exists.";
        }
    } else {
        $message = "All fields are required.";
    }
}

$db->closeCon($connectionObject);
?>

<html>
<head>
    <title>Create Client</title>
    <link rel="stylesheet" href="../CSS/userprofil.css"> <!-- External CSS -->
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
    <h2 style="text-align: center;">Create New Client</h2>

    <?php if (!empty($message)): ?>
        <p style="text-align: center; color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="create_client.php">
        <table align="center">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Create Client</button>
                </td>
            </tr>
        </table>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <button onclick="window.location.href='show_clients.php'">Back to Clients</button>
    </div>
</section>

</body>
</html>
