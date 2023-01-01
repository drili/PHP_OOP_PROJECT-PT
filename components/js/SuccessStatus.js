function SuccessStatus(cssClass, responseText, optionalField) {
    var componentWrapperStart = "<div class='success-status-wrapper'>";
    var componentWrapperEnd = "</div>";
    var component = "";

    component += "<p class='" +cssClass+ "'>" +responseText+ "</p>"

    var componentFinal = componentWrapperStart + component + componentWrapperEnd;

    return componentFinal;
}