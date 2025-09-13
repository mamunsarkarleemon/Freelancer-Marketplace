<?php
Session_start();

require_once "../Model/db.php";

// Initialize error message variables
$fullnameError = "";
$usernameError = "";
$emailError = "";
$phoneError = "";
$dobError = "";
$genderError = "";
$passwordError = "";
$repasswordError = "";
$addressError = "";
$termsError = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hasError = 0; 

    // Retrieve form data
    $fullname = $_REQUEST["fullname"];
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $dob = $_REQUEST["dob"];
    $gender = $_REQUEST["gender"];
    $password = $_REQUEST["password"];
    $repassword = $_REQUEST["repassword"];
    $address = $_REQUEST["address"];
    $terms = isset($_REQUEST["terms"]);
    $userType = "client";
  
    // Validate Full Name
    if (empty($fullname) || strlen($fullname) > 40) {
        $fullnameError = "Full Name should not exceed 40 characters.";
        $hasError++;
    }

    // Validate Username
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    }

    // Validate Email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email address";
        $hasError++;
    }

    // Validate Phone
    if (empty($phone) || !preg_match('/^0[0-9]{10}$/', $phone)) {
        $phoneError = "Phone number must start with 0 and be exactly 11 digits.";
        $hasError++;
    }

    // Validate Date of Birth
    if (empty($dob)) {
        $dobError = "Please enter your date of birth.";
        $hasError++;
    }

    // Validate Gender
    if (empty($gender)) {
        $genderError = "Please select a gender";
        $hasError++;
    }

    // Validate Password
    if (empty($password) || strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
        $passwordError = "Password must be at least 6 characters long and contain at least one Uppercase letter.";
        $hasError++;
    }

    // Validate Password Confirmation
    if ($password !== $repassword) {
        $repasswordError = "Passwords do not match.";
        $hasError++;
    }

    // Validate Address
    if (empty($address)) {
        $addressError = "Please enter your address.";
        $hasError++;
    }

    // Validate Terms Agreement
    if (!$terms) {
        $termsError = "You must agree to the terms of service.";
        $hasError++;
    }

 

    // If no errors, save data to JSON file
    if ($hasError>0) {

        echo "Please insert correct data.";
        
    } else {
/* //for JSON
        // Prepare the data array
        $data = [
            "fullname" => $fullname,
            "username" => $username,
            "email" => $email,
            "phone" => $phone,
            "dob" => $dob,
            "gender" => $gender,
            "password" => $password,
            "repassword" => $repassword,
            "address" => $address
        ];

        // Encode the data to JSON
        $json = json_encode($data);

        // Save the data to a JSON file
        file_put_contents("../Data/userdata.json", $json);

        echo "Registration successful! Data saved to JSON file.";
*/

/*   //for XML

 // Prepare the XML file path
 $xmlFilePath = "../Data/userdata.xml";

 // Load or create the XML document
 if (file_exists($xmlFilePath)) {
     $xml = simplexml_load_file($xmlFilePath);
 } else {
     $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><users></users>");
 }

 // Add new user data as a child node
 $user = $xml->addChild("user");
 $user->addChild("fullname", htmlspecialchars($fullname));
 $user->addChild("username", htmlspecialchars($username));
 $user->addChild("email", htmlspecialchars($email));
 $user->addChild("phone", htmlspecialchars($phone));
 $user->addChild("dob", htmlspecialchars($dob));
 $user->addChild("gender", htmlspecialchars($gender));
 $user->addChild("password", htmlspecialchars($password));
 $user->addChild("address", htmlspecialchars($address));

 // Save the XML structure to a file
file_put_contents( $xmlFilePath, $xml->asXML());


 echo "Registration successful! Data saved to XML file.";
 
    
*/
/*
 // Set cookies for form data,access data in profile.php
 setcookie("fullname", $fullname, time() + (86400 * 30), "/"); // Expires in 30 days
 setcookie("username", $username, time() + (86400 * 30), "/");
 setcookie("email", $email, time() + (86400 * 30), "/");
 setcookie("phone", $phone, time() + (86400 * 30), "/");
 setcookie("dob", $dob, time() + (86400 * 30), "/");
 setcookie("gender", $gender, time() + (86400 * 30), "/");
 setcookie("password", $password, time() + (86400 * 30), "/");
 setcookie("address", $address, time() + (86400 * 30), "/");
*/

//for database

// Create an instance of the database class
$mydb = new myDB();
$conobj = $mydb->openCon();

//check username exists or not
if($mydb->isUsernameExists($conobj,$username)){
    echo "Username already exists.";
}

// Insert data into the database
$result = $mydb->insertClientData($conobj, $fullname, $username, $email, $phone, $dob, $gender, $password, $repassword, $address,$userType);

//put the username and password ,usertype in user table in the database

$mydb->insertUser($conobj, $username, $password,$email,$userType);
if ($result == 1) {
    echo "Registration successful! Data saved to database.";
    header("Location:../View/login.php");
} else {
    echo "Registration failed! Data not saved to database.";
}

$mydb->closeCon($conobj);


/*
// Set session variables
$_SESSION["fullname"]=$_REQUEST[ "fullname"];
$_SESSION["username"]=$_REQUEST[ "username"];
$_SESSION["email"]=$_REQUEST[ "email"];
$_SESSION[ "phone"]=$_REQUEST[  "phone"];
$_SESSION["dob"]=$_REQUEST[ "dob"];
$_SESSION[ "gender"]=$_REQUEST[  "gender"];
$_SESSION["password"]=$_REQUEST[ "password"];
$_SESSION["repassword"]=$_REQUEST["repassword"];
$_SESSION["address"]=$_REQUEST[ "address"];

//header("Location:../View/Profile.php");
 */  
    }
}                   
?>
