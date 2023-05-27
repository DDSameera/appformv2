$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Initialization
    let medDecoInfoForm = $('#med-deco-info-form');
    let medDecoInfoBtnText = $("#btn-meddeco-info-container .btn-text");
    let medDecoInfoBtnPreloader = $("#btn-meddeco-info-container .preloader");
    let medDecoInfoContainer = $("#med-deco-info-container");
    let alertMessage = $("#med-deco-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".med-deco-info-del-btn";
    let addNewMedDecoInfoRow = $("#add-new-md-row");

    //Init First Row
    function initFirstRow() {
        addNewMedDecoInfoRow.trigger('click');

    }


    //Submit Form
    medDecoInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "meddecoinfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(medDecoInfoBtnText, medDecoInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(medDecoInfoBtnText, medDecoInfoBtnPreloader);
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

    loadAll();

    //Loading Form Data
    function loadAll() {
        $.ajax({
            type: 'GET',
            url: "meddecoinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let medDecoHtmlCode = "";
                let totalRows = response.med_deco_info.length;
                let medDecoInfo = response.med_deco_info;

                if (totalRows == 0) {
                    medDecoInfoContainer.removeClass('d-none');
                    initFirstRow();  //Initialize First Row
                } else {

                    medDecoInfoContainer.html("");
                    medDecoHtmlCode = generateHtmlCode(medDecoInfo);
                    medDecoInfoContainer.append(medDecoHtmlCode);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }

    function generateHtmlCode(medDecoInfo) {

        let medDecoHtmlCode = "";
        $.each(medDecoInfo, function (key, value) {

            medDecoHtmlCode += " <tr id=\"med-deco-serial-no-" + value.serial_no + "\">\n" +
                "                                <td>\n" +
                "                                    <input type=\"text\" class=\"form-control  serial-no\" name=\"serial_no[]\" value=\"" + value.serial_no + "\">\n" +
                "                                </td>\n" +
                "                                <td>\n" +
                "                                    <input type=\"text\" class=\"form-control\" name=\"medals[]\" value=\"" + value.medal + "\">\n" +
                "                                </td>\n" +
                "                                <td>\n" +
                "                                    <input type=\"text\" class=\"form-control\" name=\"decorations[]\" value=\"" + value.decoration + "\">\n" +
                "                                </td>\n" +
                "                                <td>\n" +
                "                                    <button type=\"button\" med-deco-serial-no=\"" + value.serial_no + "\" med-deco-info-id=\"" + value.id + "\"\n" +
                "                                            class=\"btn btn-sm btn-danger med-deco-info-del-btn\">\n" +
                "                                        <i class=\"fa fa-times-circle\"></i>\n" +
                "                                    </button>\n" +
                "                                </td>\n" +
                "                            </tr>";
        })
        return medDecoHtmlCode;

    }

    //Delete
    medDecoInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('med-deco-info-id');
        let serialNo = $(this).attr('med-deco-serial-no');



        $("#med-deco-serial-no-" + serialNo).remove();
        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "meddecoinfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(medDecoInfoBtnText, medDecoInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(medDecoInfoBtnText, medDecoInfoBtnPreloader);

                },
                success: function (response) {
                    $("#med-deco-serial-no-" + serialNo).remove();
                    displayAlertMessage(response.alert.type, response.alert.message, alertMessage);


                },
                error: function (response) {
                    displayAlertMessage(response.alert.type, response.alert.message, alertMessage);

                }


            });
        }
    });


});

