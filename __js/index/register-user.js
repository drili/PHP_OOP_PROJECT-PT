$(document).ready(function() {
    $("#register-form").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        
        $.ajax({
            type: "POST",
            url: "./AJAX/index/AJAX_register_user.php",
            data: formData,
            dataType: "json",

            success: function(response) {
                // console.log(response);
                // console.log("::: MSG: register-user.js: AJAX success");
                console.log(response.response_status);
            },

            error: function(xhr, status, error) {
                console.log("::: ERROR: register-user.js: Error making AJAX request:");
                console.log(error);
            }
        })
    })
})