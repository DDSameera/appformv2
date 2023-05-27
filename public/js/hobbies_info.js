$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Initialization
    let hobbiesInfoForm = $('#hobbies-info-form');
    let hobbiesInfoBtnText = $("#btn-hobbies-info-container .btn-text");
    let hobbiesInfoBtnPreloader = $("#btn-hobbies-info-container .preloader");
    let hobbiesInfoContainer = $("#hobbies-info-container");
    let alertMessage = $("#hobbies-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".hobby-info-del-btn";
    let addNewHobbyInfoRow = $("#add-new-hobby-row");


    //Init First Row
    function initFirstRow() {
        addNewHobbyInfoRow.trigger('click');

    }

    //Submit Form
    hobbiesInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "hobbiesinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(hobbiesInfoBtnText, hobbiesInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(hobbiesInfoBtnText, hobbiesInfoBtnPreloader);
            },
            success: function (response) {
                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);
            },
            error: function (response) {
                let errors = response.responseJSON;
                displayAlertMessage(errors.alert.type, errors.alert.message, alertMessage);

            }

        });

        //Reload Data
        loadAll();


    });

    loadAll();

    //Loading Form Data
    function loadAll() {
        $.ajax({
            type: 'GET',
            url: "hobbiesinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let academicEduHtmlCode = "";
                let totalRows = response.hobbies_info.length;
                let hobbiesInfo = response.hobbies_info;


                if (totalRows == 0) {
                    hobbiesInfoContainer.removeClass('d-none');
                    initFirstRow();  //Initialize First Row

                } else {
                    hobbiesInfoContainer.html("");
                    academicEduHtmlCode = generateHtmlCode(hobbiesInfo);
                    hobbiesInfoContainer.append(academicEduHtmlCode);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }

    function generateHtmlCode(hobbiesInfo) {
        let hobbyHtmlCode = "";
        $.each(hobbiesInfo, function (key, value) {
            hobbyHtmlCode += "<tr id=\"hobby-info-serial-no-" + value.serial_no + "\">\n" +
                "                        <td><input type=\"text\" class=\"form-control serial-no\" name=\"serial_no[]\" value=\"" + value.serial_no + "\"/></td>\n" +
                "                        <td><textarea class=\"form-control\" name=\"hobby_name[]\">" + value.name + "</textarea></td>\n" +
                "                            <td class=\"text-center\">\n" +
                "                                <button type=\"button\" hobby-info-serial-no=\"" + value.serial_no + "\" hobby-info-id=\"" + value.id + "\"\n" +
                "                                        class=\"btn btn-sm btn-danger hobby-info-del-btn\">\n" +
                "                                    <i class=\"fa fa-times-circle\"></i>\n" +
                "                                </button>\n" +
                "                            </td>\n" +

                "                    </tr>";
        })
        return hobbyHtmlCode;

    }


    //Delete
    hobbiesInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('hobby-info-id');
        let serialNo = $(this).attr('hobby-info-serial-no');
        $("#hobby-info-serial-no-" + serialNo).remove();

        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "hobbiesinfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(hobbiesInfoBtnText, hobbiesInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(hobbiesInfoBtnText, hobbiesInfoBtnPreloader);
                },
                success: function (response) {
                    displayAlertMessage(response.alert.type, response.alert.message, alertMessage);

                },
                error: function (response) {
                    displayAlertMessage(response.alert.type, response.alert.message, alertMessage);

                }


            });
        }
    });


});

