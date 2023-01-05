$(document).ready(function() {
    // *** Darkmode handling
    const checkbox = document.getElementById('checkbox')
    let darkmodeChecker = localStorage.getItem("darkmodeChecker")
    if (darkmodeChecker) {
        let darkmodeChecker = localStorage.getItem("darkmodeChecker")
    } else {
        localStorage.setItem("darkmodeChecker", "lightmode")
        let darkmodeChecker = localStorage.getItem("darkmodeChecker")
    }

    // if (darkmodeChecker === "darkmode") {
    //     $(".sidebar-section .checkbox").prop("checked", true)
    //     $("body").addClass("darkmode")
    // }

    console.log(darkmodeChecker)

    checkbox.addEventListener('change', () => {
        let darkmodeCheckerState = localStorage.getItem("darkmodeChecker");
        if (darkmodeCheckerState === "lightmode") {
            localStorage.setItem("darkmodeChecker", "darkmode")
        } else {
            localStorage.setItem("darkmodeChecker", "lightmode")
        }

        let darkmodeCheckerStateNew = localStorage.getItem("darkmodeChecker");

        document.body.classList.toggle('darkmode')
        console.log("darkmodeChecker: " + darkmodeCheckerStateNew)

        $.ajax({
            url: "../AJAX/misc/AJAX_darkmode_handler.php",
            type: "POST",
            data: {
                darkmodeStatus: darkmodeCheckerStateNew
            },
            
            success: function(response) {
                console.log(response);
            }
        })
    })

    // *** Top navigation handling
    $(".profile-image").click(function() {
        if ($(this).hasClass("click-show")) {
            $(this).removeClass("click-show")
            $(this).find("i").css({
                "transition" : "all 0.2s ease-in",
                "transform" : "rotate(0deg)",
                "color" : "var(--color-purple)"
            })

            $(".nav-main .profile-links").fadeOut("fast")
        } else {
            $(this).addClass("click-show")
            $(this).find("i").css({
                "transition" : "all 0.2s ease-in",
                "transform" : "rotate(180deg)",
                "color" : "var(--color-yellow)"
            })

            $(".nav-main .profile-links").fadeIn("fast")
        }
    })

    // *** Sidebar navigation handling
    let currentUrl = window.location.href
    let urlParts = currentUrl.split("/")
    let pageName = urlParts[urlParts.length - 1]

    pageName = pageName.replace(".php", "")
    $(".sidebar-section-menu li[data-link-value='"+ pageName +"']").addClass("menu-active")
})