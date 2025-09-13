<?php
require_once("../Model/db.php");

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    
    
    $db = new myDB();
    $conobj = $db->openCon();
    
    $results = $db->searchFreelancer($conobj, $searchQuery);

   
} else {
    header("Location: ../view/client_dashboard.php");
    exit();
}
?>
