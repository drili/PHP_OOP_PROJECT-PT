$(document).ready(function() {
    // *** Require SuccessStatus.js component
    function includeJs(jsFilePath) {
        var js = document.createElement("script");
    
        js.type = "text/javascript";
        js.src = jsFilePath;
    
        document.body.appendChild(js);
    }
    includeJs("components/js/SuccessStatus.js");

    // *** Form handling, register-form
    $("#register-form").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        
        $.ajax({
            type: "POST",
            url: "./AJAX/index/AJAX_register_user.php",
            data: formData,
            dataType: "json",

            success: function(response) {
                console.log(response.response_status);

                if (response.response_status === "USER_EMAIL_EXISTS") {
                    var cssClass = "status-error";
                    var responseText = "Email is already in use, please pick another one.";
                } else if (response.response_status === "USER_CREATED_TRUE") {
                    var cssClass = "status-success";
                    var responseText = "Account has been successfully created. <a href='./index.php'>Please login here</a>";
                } else {
                    var cssClass = "status-error";
                    var responseText = "There was an error creating your account. Make sure all fields are correctly filled.";
                }

                // *** Init SuccessStatus component
                var SuccessStatusComponent = SuccessStatus(cssClass, responseText);

                $(".form-status-message__register-form").show();
                $(".form-status-message__register-form").html(SuccessStatusComponent);
            },

            error: function(xhr, status, error) {
                console.log("::: ERROR: register-user.js: Error making AJAX request:");
                console.log(error);
            }
        })
    })
})