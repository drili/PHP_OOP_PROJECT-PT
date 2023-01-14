$(document).ready(function() {
    // *** taskModalEvent Event
    document.addEventListener("taskModalEvent", function(event) {
        $(".modal").remove();
        
        var dataTaskId = event.detail.dataTaskId;
        var htmlModal = "<div id='dataTask"+dataTaskId+"' class='modal'></div>";

        if (dataTaskId) {
            $("body").append(htmlModal);

            $('.modal').modal({
                fadeDuration: 250
            });
        }
    });
})