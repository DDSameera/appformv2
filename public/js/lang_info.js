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
    let langInfoForm = $('#lang-info-form');


    let langInfoBtnText = $("#btn-lang-info-container .btn-text");
    let langInfoBtnPreloader = $("#btn-lang-info-container .preloader");
    let alertMessage = $("#lang-info-form #alert-messages");


    //Submit Form
    langInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "langinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(langInfoBtnText,langInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(langInfoBtnText,langInfoBtnPreloader);
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
            url: "langinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                $.each(response.lang_info, function (key, value) {

                    console.log(value);

                    //1. Sinhala
                    if (value.type_name === "sinhala"){
                        $("input[name='speak_sin_fluency'][value='"+value.speaking+"']").prop('checked',true);
                        $("input[name='reading_sin_fluency'][value='"+value.reading+"']").prop('checked',true);
                        $("input[name='writing_sin_fluency'][value='"+value.writing+"']").prop('checked',true);
                    }


                    //2. English
                    if (value.type_name === "english"){
                        $("input[name='speak_en_fluency'][value='"+value.speaking+"']").prop('checked',true);
                        $("input[name='reading_en_fluency'][value='"+value.reading+"']").prop('checked',true);
                        $("input[name='writing_en_fluency'][value='"+value.writing+"']").prop('checked',true);
                    }

                    //3. Tamil
                    if (value.type_name === "tamil"){
                        $("input[name='speak_tm_fluency'][value='"+value.speaking+"']").prop('checked',true);
                        $("input[name='reading_tm_fluency'][value='"+value.reading+"']").prop('checked',true);
                        $("input[name='writing_tm_fluency'][value='"+value.writing+"']").prop('checked',true);
                    }


                    //4. Other
                   if (value.type_name === "other"){
                       $("input[name='speak_other_fluency'][value='"+value.speaking+"']").prop('checked',true);
                       $("input[name='reading_other_fluency'][value='"+value.reading+"']").prop('checked',true);
                       $("input[name='writing_other_fluency'][value='"+value.writing+"']").prop('checked',true);
                   }

                })


            },
            error: function (response) {
                console.log(response)

            }

        });
    }


});
