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
    let promotionInfoForm = $('#promotion-info-form');
    let promotionDate = $("#promotion_date");
    let presentRank = $("#present_rank");
    let substantiveRank = $("#substantive_rank");
    let promotionInfoBtnText = $("#btn-promotion-info-container .btn-text");
    let promotionInfoBtnPreloader = $("#btn-promotion-info-container .preloader");

    let alertMessage = $("#promotion-info-form #alert-messages");

    //Submit Form
    promotionInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "promitioninfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(promotionInfoBtnText, promotionInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(promotionInfoBtnText, promotionInfoBtnPreloader);
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
            url: "promotioninfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let value = response.promotion_info;
                if (value !== null) {
                    promotionDate.val(value.promotion_date);
                    presentRank.val(value.present_rank);
                    substantiveRank.val(value.substantive_rank);
                }


            },
            error: function (response) {
                console.log(response)

            }

        });
    }


});
