$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Initialization
    let higherEduInfoForm = $('#higher-edu-info-form');
    let higherEduInfoBtnText = $("#btn-higher-edu-info-container .btn-text");
    let higherEduInfoBtnPreloader = $("#btn-higher-edu-info-container .preloader");
    let higherEduInfoContainer = $("#higher-edu-info-container");
    let alertMessage = $("#higher-edu-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".higher-edu-info-del-btn";
    let addNewHigherEduInfoRow = $("#add-new-higher-edu-row");


    //Init First Row
    function initFirstRow() {
        addNewHigherEduInfoRow.trigger('click');

    }

    //Submit Form
    higherEduInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "highereduinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(higherEduInfoBtnText, higherEduInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(higherEduInfoBtnText, higherEduInfoBtnPreloader);
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
            url: "highereduinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let higherEduHtmlCode = "";
                let totalRows = response.higher_edu_info.length;
                let higherEduInfo = response.higher_edu_info;


                if (totalRows == 0) {
                    higherEduInfoContainer.removeClass('d-none');
                    initFirstRow();  //Initialize First Row

                } else {
                    higherEduInfoContainer.html("");
                    higherEduHtmlCode = generateHtmlCode(higherEduInfo);
                    higherEduInfoContainer.append(higherEduHtmlCode);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }

    function generateHtmlCode(higherEduInfo) {
        let higherEduHtmlCode = "";
        $.each(higherEduInfo, function (key, value) {
            higherEduHtmlCode += "<tr id=\"higher_edu_row_serial_no_" + value.serial_no + "\">\n" +
                "                            <td>\n" +
                "                                <input type=\"text\"  class=\"form-control serial-no\" name=\"serial_no[]\" value=\"" + value.serial_no + "\"/>\n" +
                "                            </td>\n" +
                "                            <td>\n" +
                "                                <textarea  class=\"form-control school\" name=\"school[]\">" + value.school + "</textarea>\n" +
                "                            </td>\n" +
                "                            <td>\n" +
                "                                <textarea  class=\"form-control higher-education\" name=\"higher_education[]\">" + value.higher_education + "</textarea>\n" +
                "                            </td>\n" +
                "                            <td>\n" +
                "                                <textarea  class=\"form-control qualification\" name=\"qualification[]\">" + value.qualification + "</textarea>\n" +
                "                            </td>\n" +
                "                            <td class=\"text-center\">\n" +
                "                                <button type=\"button\" higher-edu-serial-no=\"" + value.serial_no + "\" higher-edu-info-id=\"" + value.id + "\"\n" +
                "                                        class=\"btn btn-sm btn-danger higher-edu-info-del-btn\">\n" +
                "                                    <i class=\"fa fa-times-circle\"></i>\n" +
                "                                </button>\n" +
                "                            </td>\n" +
                "\n" +
                "                        </tr>";
        })
        return higherEduHtmlCode;

    }


    //Delete
    higherEduInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('higher-edu-info-id');
        let serialNo = $(this).attr('higher-edu-serial-no');
        $("#higher_edu_row_serial_no_" + serialNo).remove();

        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "highereduinfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(higherEduInfoBtnText, higherEduInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(higherEduInfoBtnText, higherEduInfoBtnPreloader);
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

