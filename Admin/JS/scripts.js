$(document).ready(function () {
    // Create Freelancer
    $("#createFreelancerForm").on("submit", function (event) {
        event.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: "create_freelancer.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                $("#message").html(`<p style="color: ${response.success ? 'green' : 'red'};">${response.message}</p>`);
                if (response.success) $("#createFreelancerForm")[0].reset();
            },
            error: function () {
                $("#message").html("<p style='color: red;'>An error occurred.</p>");
            }
        });
    });

    // Delete Freelancer
    $(".deleteFreelancer").on("click", function () {
        const user_id = $(this).data("id");

        if (confirm("Are you sure you want to delete this freelancer?")) {
            $.ajax({
                url: "delete_freelancer.php",
                type: "POST",
                data: { user_id: user_id },
                dataType: "json",
                success: function (response) {
                    alert(response.message);
                    location.reload();
                }
            });
        }
    });

    // Create Moderator
    $("#createModeratorForm").on("submit", function (event) {
        event.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: "create_moderator.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                $("#message").html(`<p style="color: ${response.success ? 'green' : 'red'};">${response.message}</p>`);
                if (response.success) $("#createModeratorForm")[0].reset();
            },
            error: function () {
                $("#message").html("<p style='color: red;'>An error occurred.</p>");
            }
        });
    });

    // Delete Moderator
    $(".deleteModerator").on("click", function () {
        const user_id = $(this).data("id");

        if (confirm("Are you sure you want to delete this moderator?")) {
            $.ajax({
                url: "delete_moderator.php",
                type: "POST",
                data: { user_id: user_id },
                dataType: "json",
                success: function (response) {
                    alert(response.message);
                    location.reload();
                }
            });
        }
    });
});
