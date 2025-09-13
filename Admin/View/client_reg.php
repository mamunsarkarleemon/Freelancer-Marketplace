<?php
require '../Control/client_reg_control.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../CSS/reg.css">
    <script src="../JS/client_reg.js"></script>

</head>
<body>
    <div class="container" align="center">
        <h2>Sign Up for Client</h2>

        <form onsubmit="return validateSignUpForm();" action="../Control/client_reg_Control.php" method="post" >
            <table>
                <tr>
                    <td><label for="fullname">Full Name:</label></td>
                    <td>
                        <input type="text" id="fullname" name="fullname">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="fullnameError"></span></td>
                </tr>
                <tr>
                    <td><label for="username">User Name:</label></td>
                    <td>
                        <input type="text" id="username" name="username">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="usernameError"></span></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="email" id="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="emailError"></span></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td>
                        <input type="tel" id="phone" name="phone">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="phoneError"></span></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td>
                        <input type="date" id="dob" name="dob">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="dobError"></span></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <select id="gender" name="gender" >
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="genderError"></span></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" id="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="passwordError"></span></td>
                </tr>
                <tr>
                    <td><label for="repassword">ReType Password:</label></td>
                    <td>
                        <input type="password" id="repassword" name="repassword" >
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="repasswordError"></span></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td>
                        <textarea id="address" name="address" rows="3"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="addressError"></span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">
                            Yes, I understand and agree to the Terms of Service, including the 
                            <a href="#" target="_blank">User Agreement</a> and 
                            <a href="#" target="_blank">Privacy Policy</a>.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="termsError"></span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button type="submit">Sign Up</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

