<?php
session_start();
require_once("../Model/db.php");

header('Content-Type: application/json');
$db = new myDB();
$connectionObject = $db->openCon();

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (empty($username) || empty($email) || empty($_POST["password"])) {
        $response["success"] = false;
        $response["message"] = "All fields are required.";
    } else {
        $sql = "INSERT INTO users (username, email, password, userType) VALUES (?, ?, ?, 'freelancer')";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);
        
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Freelancer created successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$db->closeCon($connectionObject);
echo json_encode($response);
exit();
?>
