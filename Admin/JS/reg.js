$(document).ready(function() {
    // Handle form submission
    $("#registrationForm").on("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        // Serialize form data
        const formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            url: "../Control/reg_control.php", // Path to the PHP file
            type: "POST",
            data: formData,
            dataType: "json", // Expect JSON response
            success: function(response) {
                if (response.success) {
                    // Display success message
                    $("#message").html(`<p style="color: green;">${response.message}</p>`);
                    // Optionally, reset the form
                    $("#registrationForm")[0].reset();
                } else {
                    // Display error messages
                    let errorMessages = "<ul>";
                    for (const [field, message] of Object.entries(response.errors)) {
                        errorMessages += `<li style="color: red;">${message}</li>`;
                    }
                    errorMessages += "</ul>";
                    $("#message").html(errorMessages);
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $("#message").html(`<p style="color: red;">An error occurred: ${error}</p>`);
            }
        });
    });
});