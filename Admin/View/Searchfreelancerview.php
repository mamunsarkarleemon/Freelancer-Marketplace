<?php
require_once("../Control/Searchfreelancer_cn.php");
require_once("../Control/authCheck.php");
checkLoggedIn();
?>
<html>
<head>
    <title>Search Results</title>  

    <script src="../JS/Searchfreelancerajax.js"></script>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>
    <section>
        <h2>Search Results</h2>
        <?php if (empty($results)) : ?>
            <p>No freelancers found.</p>
        <?php else : ?>
            <ul>
                <?php foreach ($results as $result) : ?>
                    <li>
                        <strong>Username:</strong> <?php echo $result['username']; ?><br>
                        <strong>User ID:</strong> <?php echo $result['user_id']; ?><br>
                        <hr>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?> 
    </section>
    <a href="../view/admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
