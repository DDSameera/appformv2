$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Initialization
    let militaryCourseInfoForm = $('#military-course-info-form');
    let militaryCourseInfoBtnText = $("#btn-military-course-info-container .btn-text");
    let militaryCourseInfoBtnPreloader = $("#btn-military-course-info-container .preloader");
    let militaryCourseInfoContainer = $("#military-course-info-container");
    let alertMessage = $("#military-course-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".military-course-info-del-btn";
    let addNewMilitaryCourseInfoRow = $("#add-new-military-course-row");


    //Init First Row
    function initFirstRow() {
        addNewMilitaryCourseInfoRow.trigger('click');

    }

    //Submit Form
    militaryCourseInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "militarycourseinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(militaryCourseInfoBtnText, militaryCourseInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(militaryCourseInfoBtnText, militaryCourseInfoBtnPreloader);
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
            url: "militarycourseinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let militaryCourseHtmlCode = "";
                let totalRows = response.military_course_info.length;
                let militaryCourseInfo = response.military_course_info;


                if (totalRows == 0) {
                    militaryCourseInfoContainer.removeClass('d-none');
                    initFirstRow();  //Initialize First Row

                } else {
                    militaryCourseInfoContainer.html("");
                    militaryCourseHtmlCode = generateHtmlCode(militaryCourseInfo);
                    militaryCourseInfoContainer.append(militaryCourseHtmlCode);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }

    function generateHtmlCode(militaryCourseInfo) {
        let militaryCourseHtmlCode = "";
        $.each(militaryCourseInfo, function (key, value) {
            militaryCourseHtmlCode += " <tr id=\"military-course-serial-no-" + value.serial_no + "\">\n" +
                "                            <td><input type=\"text\" name=\"serial_no[]\" class=\"form-control serial-no\" value=\"" + value.serial_no + "\"/></td>\n" +
                "                            <td><textarea name=\"course[]\" class=\"form-control\">" + value.course + "</textarea></td>\n" +
                "                            <td><input type=\"text\" name=\"country[]\" class=\"form-control\" value=\"" + value.country + "\"/></td>\n" +
                "                            <td><input type=\"text\" name=\"from_date[]\" class=\"form-control\" value=\"" + value.from_date + "\"/></td>\n" +
                "                            <td><input type=\"text\" name=\"to_date[]\" class=\"form-control\" value=\"" + value.to_date + "\"/></td>\n" +
                "                            <td class=\"text-center\">\n" +
                "                                <button type=\"button\" military-course-serial-no=\"" + value.serial_no + "\" military-course-info-id=\"" + value.id + "\"\n" +
                "                                        class=\"btn btn-sm btn-danger military-course-info-del-btn\">\n" +
                "                                    <i class=\"fa fa-times-circle\"></i>\n" +
                "                                </button>\n" +
                "                            </td>\n" +
                "                        </tr>";
        })
        return militaryCourseHtmlCode;

    }


    //Delete
    militaryCourseInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('military-course-info-id');
        let serialNo = $(this).attr('military-course-serial-no');
        $("#military-course-serial-no-" + serialNo).remove();

        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "militarycourseinfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(militaryCourseInfoBtnText, militaryCourseInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(militaryCourseInfoBtnText, militaryCourseInfoBtnPreloader);
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

