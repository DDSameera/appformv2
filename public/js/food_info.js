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
    let foodPrefInfoForm = $('#food-pref-info-form');


    let foodPrefInfoBtnText = $("#btn-food-pref-info-container .btn-text");
    let foodPrefInfoBtnPreloader = $("#btn-food-pref-info-container .preloader");
    let alertMessage = $("#food-pref-info-form #alert-messages");


    //Submit Form
    foodPrefInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "foodprefinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(foodPrefInfoBtnText, foodPrefInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(foodPrefInfoBtnText, foodPrefInfoBtnPreloader);
            },
            success: function (response) {
                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);


                //Reload Data
                //  loadAll();


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
            url: "foodprefinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                $.each(response.food_pref_info, function (key, value) {

                    console.log(value);

                    //1. Sinhala
                    // if (value.member_type === "student_officer"){
                    //     $("input[name='student_officer_food_type'][value='"+value.food_type+"']").prop('checked',true);
                    // }

                    switch (value.member_type) {
                        case "student_officer" :
                            $("input[name='student_officer_food_type'][value='" + value.food_type + "']").prop('checked', true);
                            break;

                        case "spouse" :
                            $("input[name='spouse_food_type'][value='" + value.food_type + "']").prop('checked', true);
                            break;

                        case "children" :
                            $("input[name='children_food_type'][value='" + value.food_type + "']").prop('checked', true);
                            break;

                    }


                })


            },
            error: function (response) {
                console.log(response)

            }

        });
    }


});
