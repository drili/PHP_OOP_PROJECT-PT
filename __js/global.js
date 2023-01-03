$(document).ready(function() {
    // *** Top navigation handling
    $(".profile-image").click(function() {
        if ($(this).hasClass("click-show")) {
            $(this).removeClass("click-show");
            $(this).find("i").css({
                "transition" : "all 0.2s ease-in",
                "transform" : "rotate(0deg)",
                "color" : "var(--color-purple)"
            })

            $(".nav-main .profile-links").fadeOut("fast");
        } else {
            $(this).addClass("click-show");
            $(this).find("i").css({
                "transition" : "all 0.2s ease-in",
                "transform" : "rotate(180deg)",
                "color" : "var(--color-yellow)"
            })

            $(".nav-main .profile-links").fadeIn("fast");
        }
    })

    // *** Sidebar navigation handling
    let currentUrl = window.location.href;
    let urlParts = currentUrl.split("/");
    let pageName = urlParts[urlParts.length - 1];

    pageName = pageName.replace(".php", "");
    $(".sidebar-section-menu li[data-link-value='"+ pageName +"']").addClass("menu-active");
})