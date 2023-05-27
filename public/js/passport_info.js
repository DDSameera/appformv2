$(document).ready(function () {

    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Init Functions
    loadAll();


    //Initialization
    let passportInfoForm = $('#passport-info-form');
    let passportId = $("#passport_id");
    let passportIssueDate = $("#issued_date");
    let passportExpireDate = $("#expire_date");
    let passportInfoBtnText = $("#btn-passport-info-container .btn-text");
    let passportInfoBtnPreloader = $("#btn-passport-info-container .preloader");
    let alertMessage = $("#passport-info-form #alert-messages");

    //Submit Form
    passportInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "passportinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(passportInfoBtnText, passportInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(passportInfoBtnText, passportInfoBtnPreloader);
            },
            success: function (response) {
                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);


                //Reload Data
                loadAll();


                //Switch To Next Tab
                $("#v-pills-passport-tab").tab('show');


            },
            error: function (response) {
                let errors = response.responseJSON;
                displayAlertMessage(errors.alert.type, errors.alert.message, alertMessage);

            }

        });


    });


    //Loading Form Data
    function loadAll() {
        $.ajax({
            type: 'GET',
            url: "passportinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let value = response.passport_info;

                if (value !== null) {
                    passportId.val(value.passport_id);
                    passportIssueDate.val(value.issued_date);
                    passportExpireDate.val(value.expire_date);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }


});
