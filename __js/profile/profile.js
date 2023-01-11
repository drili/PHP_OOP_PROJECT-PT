$(document).ready(function() {
    // *** Require JQueryToast.js component
    function includeJs(jsFilePath) {
        var js = document.createElement("script");
    
        js.type = "text/javascript";
        js.src = jsFilePath;
    
        document.body.appendChild(js);
    }
    includeJs("../components/js/JQueryToast.js");
    includeJs("../components/js/Loader.js");

    // *** Custom profile image selection
    function profileImageSelection() {
        $("#myFileProfile").change(function(e) {

            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                
                var file = e.originalEvent.srcElement.files[i];
                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                     img.src = reader.result;
                }
                reader.readAsDataURL(file);

                $(".profile-edit-image .image-section").html(img);
                $(".updated-image-name").text(file.name);
            }
        });
    
        $(".image-edit-label").click(function(e) {
            e.preventDefault();
    
            $("#myFileProfile").trigger("click");
        })
    }

    // *** ajaxUpdateProfile
    function ajaxUpdateProfile() {
        $(".form-user-profile").submit(function(event) {
            event.preventDefault();
            
            var formData = $(this).serialize();
            const fileInput = document.querySelector('input[type="file"]');
            const file = fileInput.files[0];

            $.ajax({
                type: "POST",
                url: "../AJAX/profile/AJAX_update_user.php",
                data: formData,
                dataType: "json",
                success: function(response) {
                    // console.log(response.update_user_res);

                    if (response.update_user_res === "USER_UPDATE_SUCCESS") {
                        toastMessageSuccess("Success!", "Profile has been updated successfully.");
                        var loaderComponent = Loader();

                        if(file !== undefined) {
                            ajaxUpdateProfileImage(file)
                        }

                        $(".user-profile").html(loaderComponent);
                        setTimeout(() => {
                            ajaxFetchImageSection();
                        }, 1000);
                    } else {
                        var errorString = "There was an error updating your profile: " + response.update_user_res;
                        toastMessageError("Error!", errorString);
                    }
                },

                error: function(xhr, status, error) {
                    console.log("::: ERROR: profile.js: Error making AJAX request:");
                    console.log(error);
                }
            })
        })
    }

    function ajaxUpdateProfileImage(file) {
        console.log({file});
        
        data = new FormData();
        data.append("file", file)
        
        $.ajax({
            type: "POST",
            url: "../AJAX/profile/AJAX_update_user_image.php",
            data: data,
            contentType: false,
            processData: false,

            success: function(response) {
                console.log(response);
            }
        })
    }

    // *** ajaxFetchImageSection
    function ajaxFetchImageSection() {
        $.ajax({
            url: "../AJAX/profile/AJAX_FETCH_image-section.php",
            
            success: function(response) {
                $(".user-profile").html(response);
            }
        })
    }

    // *** INIT functions
    profileImageSelection();
    ajaxFetchImageSection();
    ajaxUpdateProfile();
})