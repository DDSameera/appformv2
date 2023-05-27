$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Initialization
    let academicEduInfoForm = $('#academic-edu-info-form');
    let academicEduInfoBtnText = $("#btn-academic-edu-info-container .btn-text");
    let academicEduInfoBtnPreloader = $("#btn-academic-edu-info-container .preloader");
    let academicEduInfoContainer = $("#academic-edu-info-container");
    let alertMessage = $("#academic-edu-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".academic-edu-info-del-btn";
    let addNewAcademicEduInfoRow = $("#add-new-academic-edu-row");


    //Init First Row
    function initFirstRow() {
        addNewAcademicEduInfoRow.trigger('click');

    }

    //Submit Form
    academicEduInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "academiceduinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(academicEduInfoBtnText, academicEduInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(academicEduInfoBtnText, academicEduInfoBtnPreloader);
                //Reload Data
                loadAll();
            },
            success: function (response) {
                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);
            },
            error: function (response) {
                let errors = response.responseJSON;
                displayAlertMessage(errors.alert.type, errors.alert.message, alertMessage);

            }

        });




    });

    loadAll();

    //Loading Form Data
    function loadAll() {
        $.ajax({
            type: 'GET',
            url: "academiceduinfo/index",
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
                let totalRows = response.academic_edu_info.length;
                let academicEduInfo = response.academic_edu_info;


                if (totalRows == 0) {
                    academicEduInfoContainer.removeClass('d-none');
                    initFirstRow();  //Initialize First Row

                } else {
                    academicEduInfoContainer.html("");
                    academicEduHtmlCode = generateHtmlCode(academicEduInfo);
                    academicEduInfoContainer.append(academicEduHtmlCode);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }

    function generateHtmlCode(academicEduInfo) {
        let academicEduHtmlCode = "";
        $.each(academicEduInfo, function (key, value) {
            console.log(value);
            academicEduHtmlCode += "<tr id=\"academic-edu-row-serial-no-" + value.serial_no + "\">\n" +
                "                            <td><input type=\"text\" class=\"form-control serial-no\" name=\"serial_no[]\" value=\"" + value.serial_no + "\"/></td>\n" +
                "                            <td><textarea class=\"form-control\" name=\"academic_qualification[]\">" + value.academic_qualification + "</textarea></td>\n" +
                "                            <td><textarea class=\"form-control\" name=\"institute_name[]\">" + value.institute_name + "</textarea></td>\n" +
                "                            <td><textarea class=\"form-control\" name=\"year_of_award[]\">" + value.award_year + "</textarea></td>\n" +
                "                            <td><a class=\"btn\" data-fancybox data-type=\"pdf\"  href=\"../secure/certificate/view/"+value.scanned_certificate+"\"><i class=\"fa fa-2x fa-file-pdf\"></i></a><input type=\"file\" class=\"form-control-file form-control-sm\" name=\"scanned_certificate[]\"\></td>\n" +
                "                            <td class=\"text-center\">\n" +
                "                                <button type=\"button\" academic-edu-serial-no=\"" + value.serial_no + "\" academic-edu-info-id=\"" + value.id + "\"\n" +
                "                                        class=\"btn btn-sm btn-danger academic-edu-info-del-btn\">\n" +
                "                                    <i class=\"fa fa-times-circle\"></i>\n" +
                "                                </button>\n" +
                "                            </td>\n" +
                "                        </tr>";
        })
        return academicEduHtmlCode;

    }


    //Delete
    academicEduInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('academic-edu-info-id');
        let serialNo = $(this).attr('academic-edu-serial-no');
        $("#academic-edu-row-serial-no-" + serialNo).remove();

        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "academiceduinfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(academicEduInfoBtnText, academicEduInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(academicEduInfoBtnText, academicEduInfoBtnPreloader);
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

