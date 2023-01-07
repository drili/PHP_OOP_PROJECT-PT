$(document).ready(function() {
    // *** Custom profile image selection
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
        }
    });

    $(".image-edit-label").click(function(e) {
        e.preventDefault();

        $("#myFileProfile").trigger("click");
    })
})