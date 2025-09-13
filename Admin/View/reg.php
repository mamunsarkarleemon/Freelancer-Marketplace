<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="../CSS/reg.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery for AJAX -->
    <script src="../JS/reg.js"></script> <!-- Include your custom JS file -->
</head>
<body>
<div class="container">
    <h2 style="text-align: center;">Register Here</h2> <!-- Centered Heading -->
    
    <!-- Form with ID for easy selection -->
    <form id="registrationForm">
        <table>
            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td><input type="text" id="fullname" name="fullname"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td><label for="re_password">Confirm Password:</label></td>
                <td><input type="password" id="re_password" name="re_password"></td>
            </tr>
            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <select id="gender" name="gender">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="date" id="dob" name="dob"></td>
            </tr>
            <tr>
                <td><label for="phone">Phone:</label></td>
                <td><input type="tel" id="phone" name="phone"></td>
            </tr>
            <tr>
                <td><label for="nid">NID:</label></td>
                <td><input type="text" id="nid" name="nid"></td>
            </tr>
            <tr>
                <td><label for="present_address">Present Address:</label></td>
                <td><textarea id="present_address" name="present_address"></textarea></td>
            </tr>
            <tr>
                <td><label for="permanent_address">Permanent Address:</label></td>
                <td><textarea id="permanent_address" name="permanent_address"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="checkbox-container">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">I agree to the terms and conditions</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Register</button>
                </td>
            </tr>
        </table>
    </form>

    <!-- Centered "Back to Login" Button -->
    <div style="text-align: center; margin-top: 20px;">
        <button type="button" onclick="window.location.href='login.php';">Back to Login</button>
    </div>

    <!-- Display success/error messages here -->
    <div id="message"></div>
</div>
</body>
</html>