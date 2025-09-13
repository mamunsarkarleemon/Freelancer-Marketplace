<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <script src="../JS/login.js"></script>
</head>
<body>
    <table align="center">
        <tr>
            <td>
                <fieldset>
                    <legend><h2>Admin Login</h2></legend>
                    <form onsubmit="return validateLoginForm();" action="../Control/login_control.php" method="post">
                        <div class="form-group">
                            <label for="username"><b>User Name:</b></label>
                            <input type="text" id="username" name="username">
                            <span id="usernameError" class="error"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="password"><b>Password:</b></label>
                            <input type="password" id="password" name="password">
                            <span id="passwordError" class="error"></span>
                        </div>

                        <input type="submit" value="Login">
                        <br><br>
                    </form>

                    <form action="../../Admin/View/reg.php" method="post">
                        <b>Don't have an account?</b> 
                        <br>
                        <input type="hidden" name="user_type" value="admin">
                        <input type="submit" name="signup" value="Signup as Admin">
                    </form>
                </fieldset>
            </td>
        </tr>
    </table> 
</body>
</html>