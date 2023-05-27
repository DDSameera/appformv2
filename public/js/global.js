//Active Preloader Button
function setActivePreloaderBtn(btnText, btnPreloader) {
    btnText.addClass('d-none');
    btnPreloader.removeClass('d-none');
}

//Deactive Preloader Button
function setDeactivePreloaderBtn(btnText, btnPreloader) {
    btnText.removeClass('d-none');
    btnPreloader.addClass('d-none');
}

//Display Alert Message
function displayAlertMessage(type, message, alertMessage) {
    let isMessageArray = jQuery.isArray(message);
    let htmlAlertCode = "";
    switch (type) {
        case 'success' :
            htmlAlertCode += "<div class='alert alert-success'>" + message + "</div>";
            break

        case 'danger' :

            if (isMessageArray) {
                //Validation errors
                $.each(message, function (key, value) {
                    htmlAlertCode += "<div class='alert alert-danger'>";
                    htmlAlertCode += value;
                    htmlAlertCode += "</div>";
                });

            } else {
                //Error
                htmlAlertCode += "<div class='alert alert-danger'>" + message + "</div>"

            }
            break

    }
    alertMessage.html(htmlAlertCode);
}
