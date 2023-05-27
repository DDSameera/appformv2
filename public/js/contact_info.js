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
    let contactInfoForm = $('#contact-info-form');
    let officeAddress = $("#office-address");
    let residentialAddress = $("#residential-address");
    let mobileContactNo = $("#mobile-contact");
    let homeContactNo = $("#home-contact");
    let whatsAppNo = $("#whatsapp-contact");
    let viberNo = $("#viber-contact");


    let contactInfoBtnText = $("#btn-contact-info-container .btn-text");
    let contactInfoBtnPreloader = $("#btn-contact-info-container .preloader");
    let alertMessage = $("#contact-info-form #alert-messages");


    //Submit Form
    contactInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "contactinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(contactInfoBtnText, contactInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(contactInfoBtnText, contactInfoBtnPreloader);
            },
            success: function (response) {
                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);


                //Reload Data
                loadAll();


                //Switch To Next Tab
                //$("#v-pills-education-tab").tab('show');


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
            url: "contactinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let value = response.contact_info;
                if (value !== null) {
                    residentialAddress.val(value.residential_address);
                    officeAddress.val(value.office_address);
                    mobileContactNo.val(value.mobile_contact);
                    homeContactNo.val(value.home_contact);
                    whatsAppNo.val(value.whatsapp_contact);
                    viberNo.val(value.viber_contact);
                }


            },
            error: function (response) {
                console.log(response)

            }

        });
    }


});
