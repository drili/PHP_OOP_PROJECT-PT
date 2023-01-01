$(document).ready(function() {
    $("#login-form").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "./AJAX/index/AJAX_login_user.php",
            data: formData,
            dataType: "json",

            success: function(response) {
                console.log(response);
                if (response['response_status'] == "LOGGED_IN") {
                    window.location.href = "./views/dashboard.php";
                }
            },

            error: function(xhr, status, error) {
                console.log("::: ERROR: login-user.js: Error making AJAX request:");
                console.log(error);
            }
        })
    })
})