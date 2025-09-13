<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../model/db.php";

$errors = [];
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitize($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }

    $fullname = sanitize($_POST["fullname"] ?? '');
    $username = sanitize($_POST["username"] ?? '');
    $email = sanitize($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';
    $re_password = $_POST["re_password"] ?? '';
    $userType = "client"; // Default user type; change if needed

    // Validation
    if (empty($fullname) || preg_match('/[0-9]/', $fullname)) {
        $errors['fullname'] = "Full Name should not contain numbers.";
    }

    if (empty($username) || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors['username'] = "Username can only contain letters, numbers, and underscores.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    if (empty($password) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$&])[A-Za-z\d@#$&]{8,}$/', $password)) {
        $errors['password'] = "Password must be at least 8 characters long, include a letter, number, and special character.";
    }

    if ($password !== $re_password) {
        $errors['re_password'] = "Passwords do not match.";
    }

    if (empty($errors)) {
        try {
            $db = new myDB();
            $connection = $db->openCon();

            // Check if email or username already exists
            $stmt = $connection->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
            $stmt->bind_param("ss", $email, $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $errors['database'] = "Email or username already exists.";
            } else {
                // Hash the password before storing it
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user
                $stmt = $connection->prepare("INSERT INTO users (username, password, email, userType) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $username, $password, $email, $userType);

                if ($stmt->execute()) {
                    $successMessage = "✅ Registration successful! Data saved.";
                } else {
                    $errors['database'] = "❌ Registration failed! Unable to save data.";
                }
            }

            $stmt->close();
            $db->closeCon($connection);
        } catch (Exception $e) {
            $errors['database'] = "❌ Error: " . $e->getMessage();
        }
    }

    // Return JSON response
    echo json_encode([
        'success' => empty($errors),
        'errors' => $errors,
        'message' => $successMessage
    ]);
    exit();
}
?>
