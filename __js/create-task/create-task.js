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

    // *** Init select2
    $('.js-example-basic-multiple').select2();

    // *** Init Quill
    var quill = new Quill('#QuillEditor', {
        theme: 'snow'
    });

    // *** SessionStorage handling
    window.onload = function() {
        var createTaskMessage = sessionStorage.getItem("createTaskMessage");
        if (createTaskMessage) {
            toastMessageSuccess("Success!", "Task has been created successfully");
            sessionStorage.removeItem("createTaskMessage");
        }
    }
    

    // *** Create Task form
    var form = $('.form-create-task');

    // *** Create task options
    var buttonChecker = "";
    $(".btn-create-task-default").click(function(e) {
        e.preventDefault();
        buttonChecker = "DEFAULT";

        form.submit();
    })
    
    $(".btn-create-task-w-settings").click(function(e) {
        e.preventDefault();
        buttonChecker = "W_SETTINGS";

        form.submit();
    })

    form.on("submit", function(e) {
        e.preventDefault();
        $(".validate-required").each(function() {
            $(this).removeClass("fail-input");
        })

        var formData = form.serialize();
        var taskDescription = $(".task_description .ql-editor").html();
        var formValidation = "FORM_VALIDATION_SUCCESS";

        $(".validate-required").each(function() {
            var input_value = $(this).val();
            if (!input_value) {
                formValidation = "FORM_VALIDATION_ERROR";

                if ($(this).hasClass("validate-required-select2")) {
                    $(this).siblings(".select2-container").find(".select2-selection").addClass("fail-input");
                } else {
                    $(this).addClass("fail-input");
                }
            }

            if ($(this).hasClass("validate-required-select2")) {
                var x1 = $(this).siblings(".select2-container").find(".select2-selection__rendered");
                var x2 = x1.find(".select2-selection__choice");

                if (x2.length === 0) {
                    formValidation = "FORM_VALIDATION_ERROR";
                }
            }
        })

        if (formValidation === "FORM_VALIDATION_ERROR") {
            toastMessageError("Error!", "Fields cannot be empty!");
        } else {
            $.ajax({
                type: "POST",
                url: "../AJAX/create-task/AJAX_create_task.php",
                dataType: "json",
                data: {
                    formData,
                    taskDescription
                },

                success: function(data) {
                    console.log({data});
                    if (data.query_status === "SUCCESS_TASK_CREATED") {
                        toastMessageSuccess("Success!", "Task has been created successfully");

                        $(".validate-required").each(function() {
                            $(this).removeClass("fail-input");
                        })

                        if (buttonChecker === "DEFAULT") {
                            sessionStorage.setItem('createTaskMessage', 'Task has been created successfully');
                            window.location.reload();
                        } else {
                            var loaderComponent = Loader();
                            $(".fetched-tasks-by-user").html(loaderComponent);
                            setTimeout(() => {
                                ajaxFetchLatestTasksByUser();
                            }, 250);
                        }
                    } else if (data.query_status === "ERR_CREATING_TASK_TIME") {
                        toastMessageError("Error!", "Task low cannot be higher than task high.");
                        $('input[name="task_low"]').addClass("fail-input");
                    } else {
                        toastMessageError("Error!", "There was an error creating your task, please try again.");
                    }
                },

                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log({error});
                }
            })
        }
    })

    // *** Fetch latest tasks by user
    function ajaxFetchLatestTasksByUser() {
        $.ajax({
            type: "GET",
            url: "../AJAX/create-task/AJAX_fetch_latest_tasks_by_user.php",

            success: function(data) {
                setTimeout(() => {
                    $(".fetched-tasks-by-user").html(data);
                    clickTasksModal();
                }, 250);
            },

            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log({error});
            }
        })
    }
    ajaxFetchLatestTasksByUser();

    // *** Tasks Modal
    function clickTasksModal() {
        $(".task-single").click(function(e) {
            e.preventDefault();

            var dataTaskId = $(this).attr("data-task-id");
            var taskModalEventData = new CustomEvent("taskModalEvent", {
                "detail": {
                    "dataTaskId" : dataTaskId
                }
            })
            document.dispatchEvent(taskModalEventData);
        })
    }
})