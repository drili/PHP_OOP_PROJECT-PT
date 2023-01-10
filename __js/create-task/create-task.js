$(document).ready(function() {
    // *** Init select2
    $('.js-example-basic-multiple').select2();

    // *** Create Task form
    var form = $('.form-create-task');

    form.on("submit", function(e) {
        e.preventDefault();

        var formData = form.serialize();
        var taskDescription = $(".task_description").html();

        $.ajax({
            type: "POST",
            url: "../AJAX/create-task/AJAX_create_task.php",
            data: {
                formData,
                taskDescription
            },

            success: function(data) {
                console.log(data);
            },

            error: function(xhr, status, error) {
                console.log({error});
            }
        })
    })
})