<?php
session_start();
require_once("../Model/db.php");

header('Content-Type: application/json');
$db = new myDB();
$connectionObject = $db->openCon();

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];

    $sql = "DELETE FROM users WHERE id = ? AND userType = 'freelancer'";
    $stmt = $connectionObject->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $response["success"] = true;
        $response["message"] = "Freelancer deleted successfully!";
    } else {
        $response["success"] = false;
        $response["message"] = "Error: Unable to delete freelancer.";
    }

    $stmt->close();
}

$db->closeCon($connectionObject);
echo json_encode($response);
exit();
?>
