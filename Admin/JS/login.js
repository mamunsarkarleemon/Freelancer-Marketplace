function validateLoginForm() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    // Clear previous error messages
    document.getElementById('usernameError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';

    let isValid = true;

    if (username.trim() === "") {
        document.getElementById('usernameError').innerHTML = "Please enter a username";
        document.getElementById('usernameError').style.color = 'red';
        isValid = false;
    }

    if (password.trim() === "") {
        document.getElementById('passwordError').innerHTML = "Please enter a password";
        document.getElementById('passwordError').style.color = 'red';
        isValid = false;
    }

    if (isValid) {
        // Perform AJAX login
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../Control/login_control.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = xhr.responseText;

                // Check if login was unsuccessful
                if (response.includes("Invalid username")) {
                    document.getElementById('usernameError').innerHTML = "Invalid username";
                    document.getElementById('usernameError').style.color = 'red';
                } else if (response.includes("Invalid password")) {
                    document.getElementById('passwordError').innerHTML = "Invalid password";
                    document.getElementById('passwordError').style.color = 'red';
                } else {
                    // Handle successful login, redirect based on userType
                    if (response.includes("client_dashboard")) {
                        window.location.href = "../View/client_dashboard.php";
                    } else if (response.includes("freelancer_dashboard")) {
                        window.location.href = "../../Freelancer/View/freelancer_dashboard.php";
                    } else if (response.includes("admin_dashboard")) {
                        window.location.href = "../../Admin/View/admin_dashboard.php";
                    } else if (response.includes("moderator_dashboard")) {
                        window.location.href = "../../Moderator/View/moderator_dashboard.php";
                    } else {
                        alert("Unexpected error occurred.");
                    }
                }
            } else {
                alert("An error occurred during login.");
            }
        };

        xhr.onerror = function() {
            alert("A network error occurred.");
        };

        // Send the login data to the server
        let data = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
        xhr.send(data);

        return false; // Prevent form from traditional submission
    }

    return false; // Prevent form from traditional submission if validation fails
}


//for singup form
function validlogin() {
    let userType = document.getElementById("userType").value;
    let userTypeError = document.getElementById('userTypeError');

    userTypeError.innerHTML = "";

    if (userType.trim() === "") {
        userTypeError.innerHTML = 'User Type is required.';
        userTypeError.style.color = 'red';
        return false;
    }

    return true;
}