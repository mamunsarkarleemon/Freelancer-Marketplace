<?php
session_start();
require_once "../Model/db.php"; // Adjust the path to where myDB.php is located

// Initialize error message variables
$usernameError = "";
$passwordError = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = 0;

    // Retrieve form data
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    // Validate Username
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    }

    // Validate Password
    if (empty($password)) {
        $passwordError = "Please enter a password";
        $hasError++;
    }

    // If no errors, check login credentials
    if ($hasError == 0) {
        // Create an instance of the database class
        $mydb = new myDB();
        $conobj = $mydb->openCon();

        // Check login credentials
        $result = $mydb->getUserByUsername($conobj, $username);
        
        if($result){
            if($password == $result['password']){
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $result['userType'];
                $_SESSION['user_id'] = $result['user_id'];

                if ($result['userType'] == 'client') {
                    header("location: ../View/admin_dashboard.php");
                } elseif ($result['userType'] == 'freelancer') {
                    header("location: ../../Freelancer/View/freelancer_dashboard.php");
                } elseif ($result['userType'] == 'admin') {
                    header("location: ../../Admin/View/admin_dashboard.php");
                } elseif ($result['userType'] == 'moderator') {
                    header("location: ../../Moderator/View/moderator_dashboard.php");
                } else {
                   exit();
                }
            } else {
                $passwordError = "Invalid password";
            }
        } else {
            $usernameError = "Invalid username";
        }

        // Close the database connection
        $mydb->closeCon($conobj);
    }

    // Display error messages
    if (!empty($usernameError)) {
        echo $usernameError . "<br>";
    }
    if (!empty($passwordError)) {
        echo $passwordError . "<br>";
    }
    if (!empty($errorMessage)) {
        echo $errorMessage . "<br>";
    }
}
?>