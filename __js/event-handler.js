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
            }, ajaxFetchTask(dataTaskId));

            function ajaxFetchTask(dataTaskId) {
                $.ajax({
                    type: "POST",
                    url: "../AJAX/globals/AJAX_fetch_modal_task.php",
                    data: {
                        dataTaskId : dataTaskId
                    },

                    success: function(response) {
                        console.log({response});
                        $(".modal").html(response);
                    },

                    error: function(xhr, error, status) {
                        console.log(xhr.responseText);
                    }
                })
            }
        }
    });
})