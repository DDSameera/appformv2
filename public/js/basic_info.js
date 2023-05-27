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
    let basicInfoForm = $('#ajax-basic-info-form');
    let fname = $("#fname");
    let mname = $("#mname");
    let lname = $("#lname");
    let nic = $("#nic");
    let email = $("#email");
    let profileImage = $("#current_profile_image");
    let other_info = $("#other_info");
    let basicInfoBtnText = $("#btn-basic-info-container .btn-text");
    let basicInfoBtnPreloader = $("#btn-basic-info-container .preloader");

    //Submit Form
    basicInfoForm.submit(function (event) {

        event.preventDefault();

        let alertMessage = $("#alert-messages");
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "basicinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(basicInfoBtnText, basicInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(basicInfoBtnText, basicInfoBtnPreloader);
            },
            success: function (response) {
                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);


                //Reload Data
                loadAll();




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
            url: "basicinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {


                let value = response.basic_info;
                fname.val(value.fname);
                mname.val(value.mname);
                lname.val(value.lname);
                nic.val(value.nic);
                email.val(value.email);
                other_info.val(value.other_info);

                if (value.profile_img == '' || value.profile_img == null) {
                    $("#current_profile_image").remove();
                 } else {
                    d = new Date();
                    let imagePath = "../secure/profileimg/" + value.profile_img + "?" + d.getTime();
                    profileImage.attr("src", imagePath);
                    profileImage.removeClass('d-none');

                }


            },
            error: function (response) {
                console.log(response)

            }

        });
    }


});
