<?php
session_start();
require_once("authCheck.php");
checkLoggedIn();

// Include the database connection
require_once("../Model/db.php");

$db = new myDB();
$connectionObject = $db->openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"])) {
    $user_id = intval($_POST["user_id"]);

    if ($db->deleteUser($connectionObject, $user_id)) {
        header("Location: ../View/show_clients.php");
        exit();
    } else {
        echo "Error deleting client.";
    }
}

$db->closeCon($connectionObject);
?>
