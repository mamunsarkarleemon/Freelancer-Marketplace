<?php
session_start();
require_once("../Control/authCheck.php");
checkLoggedIn();
?>

<html>
<head>
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="../CSS/reg.css">

</head>
<body>
<nav align="right">
    <a href="admin_dashboard.php">Home</a>|
    <a href="profile.php">Profile</a>|
    
 
    <br><br>
    <form action="../View/Searchfreelancerview.php" method="GET">
        <label for="search"><strong>Search Freelancers:</strong></label>
        <input type="text" id="search" name="search" placeholder="Enter username or user ID">
        <input type="submit" value="Search">
    </form>
</nav>
<br> </br>
<section>
<h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
    
    <button onclick="redirectToShowClients()">Show Clients</button> <!-- New Button -->
    
    <script>
        
        function redirectToShowClients() {
            window.location.href = 'show_clients.php'; // Redirect to the new page
        }
    </script>

</section>


<section>
    <button onclick="redirectToShowAdmins()">Show Admins</button> <!-- Fixed function name -->
    
    <script>
       

        function redirectToShowAdmins() { // Fixed function name
            window.location.href = 'show_admins.php'; 
        }
    </script>
</section>


<section>
    <button onclick="redirectToShowMods()">Show Moderators</button> <!-- Fixed function name -->
    
    <script>
        function redirectToShowMods() { 
            window.location.href = 'show_modarator.php'; 
        }
    </script>
</section>




<section>
    
    <button onclick="redirectToShowfreelancers()">Show Freelancers</button> <!-- New Button -->

    <script>
        
        function redirectToShowfreelancers() {
            window.location.href = 'show_freelancer.php'; // Redirect to the new page
        }
    </script>
</section>
 <section>

<!-- Back Button -->
 <button class="back" onclick="goBack()" style="margin-bottom: 20px;">Back to Login</button>
    
</section>
<!-- JavaScript for Back Button -->
<script>
    function goBack() {
        
        window.location.href = "../Control/logoutCheck.php"
    }
</script>

</body>
</html>