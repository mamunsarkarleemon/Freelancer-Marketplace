<?php
    session_start();
    require_once("../Control/authCheck.php");
    checkLoggedIn();
   
?>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>

    <nav align="right">
    <a href="<?php
    if ($_SESSION['userType'] === 'client') {
        echo 'admin_dashboard.php';
    } elseif ($_SESSION['userType'] === 'freelancer') {
        echo 'freelancer_dashboard.php';
    } elseif ($_SESSION['userType'] === 'admin') {
        echo 'admin_dashboard.php';
    } elseif ($_SESSION['userType'] === 'moderator') {
        echo 'moderator_dashboard.php';
    } else {
    }
    ?>">Home</a>|
          <a href="profile.php">Profile</a>|
          <a href="inbox.php">Message</a>|
          <a href="settings.php">Settings</a>|
          <a href="../Control/logoutCheck.php">Logout</a>
    </nav>

    

    <section align="center">
        <h2>User Profile</h2>
    </section>

    
    <div>
        <?php
            require_once("../Model/db.php");
            $username = $_SESSION['username'];

            //create instance of db class
            $db = new myDB();
            $connection = $db->openCon();

            $user =$db->getUserByUsername($connection,$username);
            if ($user) {
                echo "<p><strong>Username:</strong> " . $user['username'] . "</p>";
                echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
                echo "<p><strong>User Type:</strong> " . $user['userType'] . "</p>";
            } else {
                echo "<p>Error: User not found.</p>";
            }
        ?>
    </div>

    <?php
        $profilePicPath = "../uploads/profile_2" . $user['user_id'] . ".jpg";
        if (!file_exists($profilePicPath)) {
            $profilePicPath = "../uploads/profile_2.jpg";
        }

    ?>

    <h3>Profile Picture</h3>
    <img src="<?php echo $profilePicPath; ?>" alt="Profile Picture" width="150" height="150">


</body>
</html>
