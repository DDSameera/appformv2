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
    let appointmentInfoForm = $('#appointment-info-form');
    let appointmentInfoContainer = $("#appointment-info-container");
    let appointmentInfoBtnPreloader = $("#btn-appointment-info-container .preloader");
    let appointmentInfoBtnText = $("#btn-appointment-info-container .btn-text");
    let alertMessage = $("#appointment-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".appointment-info-del-btn";
    let addNewAppointmentInfoRow = $("#add-new-appointment-row");



    //Init First Row
    function initFirstRow() {
        addNewAppointmentInfoRow.trigger('click');

    }

    //Submit Form
    appointmentInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "appointmentinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(appointmentInfoBtnText, appointmentInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(appointmentInfoBtnText, appointmentInfoBtnPreloader);
            },
            success: function (response) {

                displayAlertMessage(response.alert.type, response.alert.message, alertMessage);

                //Reload Data
                loadAll();

                //Switch To Next Tab
                $("#v-pills-appointment-tab").tab('show');


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
            url: "appointmentinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let appointmentHtmlCode = "";
                let totalRows = response.appointment_info.length;
                let appointmentInfo = response.appointment_info;

                if (totalRows == 0) {
                    $("#appointment-info-container").removeClass('d-none');
                    initFirstRow();  //Initialize First Row
                } else {

                    appointmentInfoContainer.html("");
                    appointmentHtmlCode = generateHtmlCode(appointmentInfo);
                    appointmentInfoContainer.append(appointmentHtmlCode);
                }


            },
            error: function (response) {
                console.log(response)
            }

        });
    }

    function generateHtmlCode(appointmentInfo) {
        let appointmentHtmlCode = "";
        $.each(appointmentInfo, function (key, value) {
            appointmentHtmlCode += "  <tr id=\"appointment-serial-no-" + value.serial_no + "\">" +
                "                            <td><input type=\"text\"  class=\"form-control serial-no\" name=\"serial_no[]\" value=\"" + value.serial_no + "\"/> </td>\n" +
                "                            <td><textarea  class=\"form-control\" name=\"appointment[]\">" + value.appointment + "</textarea></td>\n" +
                "                            <td><textarea  class=\"form-control\" name=\"rank[]\">" + value.rank + "</textarea></td>\n" +
                "                            <td><input type=\"text\" class=\"form-control datepicker\" name=\"from_date[]\" placeholder=\"YYYY-MM-DD\" value=\"" + value.from_date + "\"/></td>\n" +
                "                            <td><input type=\"text\"  class=\"form-control datepicker\" name=\"to_date[]\"  placeholder=\"YYYY-MM-DD\"  value=\"" + value.to_date + "\"/></td>\n" +
                "                            <td class=\"text-center\">\n" +
                "                                <button type=\"button\" appointment-serial-no=\"" + value.serial_no + "\" appointment-info-id=\"" + value.id + "\"\n" +
                "                                        class=\"btn btn-sm btn-danger appointment-info-del-btn\">\n" +
                "                                    <i class=\"fa fa-times-circle\"></i>\n" +
                "                                </button>\n" +
                "                            </td>\n" +
                "                        </tr>";

        })
        return appointmentHtmlCode;

    }


    //Delete
    appointmentInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('appointment-info-id');
        let serialNo = $(this).attr('appointment-serial-no');
        $("#appointment-serial-no-" + serialNo).remove();

        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "appointmentinfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(appointmentInfoBtnText, appointmentInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(appointmentInfoBtnText, appointmentInfoBtnPreloader);
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
