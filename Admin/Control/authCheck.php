<?php
function checkLoggedIn() {
    if (!isset($_SESSION['username'])) {
        header("location: ../View/login.php");
        exit();
    }
}

?>
