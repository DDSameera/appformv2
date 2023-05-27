$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Initialization
    let childrenInfoForm = $('#martial-status-info-form');
    let maritalStatusInfoBtnText = $("#btn-marital-status-info-container .btn-text");
    let maritalStatusInfoBtnPreloader = $("#btn-marital-status-info-container .preloader");
    let childrenInfoContainer = $("#children-info-container");
    let alertMessage = $("#martial-status-info-form #alert-messages");
    let onclickDeleteBtnSelector = ".children-info-del-btn";
    let addNewChildrenInfoRow = $("#add-new-children-row");
    let spouseName = $("#name-of-spouse");

    //Init First Row
    function initFirstRow() {
        addNewChildrenInfoRow.trigger('click');

    }

    //Submit Form
    childrenInfoForm.submit(function (event) {

        event.preventDefault();

        let formData = new FormData(this);

        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "childreninfo/save",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                alertMessage.html("");
                setActivePreloaderBtn(maritalStatusInfoBtnText, maritalStatusInfoBtnPreloader);
            },
            complete: function () {
                setDeactivePreloaderBtn(maritalStatusInfoBtnText, maritalStatusInfoBtnPreloader);
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
    loadSpouseInfo();

    //Loading Form Data
    function loadAll() {
        $.ajax({
            type: 'GET',
            url: "childreninfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let childrenHtmlCode = "";
                let totalRows = response.children_info.length;
                let childrenInfo = response.children_info;


                if (totalRows == 0) {
                    //   initFirstRow();  //Initialize First Row

                } else {
                    childrenInfoContainer.html("");
                    childrenHtmlCode = generateHtmlCode(childrenInfo);
                    childrenInfoContainer.append(childrenHtmlCode);
                }

            },
            error: function (response) {
                console.log(response)

            }

        });
    }


    //Loading SpouseInfo
    function loadSpouseInfo() {
        $.ajax({
            type: 'GET',
            url: "spouseinfo/index",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            complete: function () {

            },
            success: function (response) {

                let value = response.spouse_info;
                if (value !== null) {
                    spouseName.val(value.name);
                }


            },
            error: function (response) {
                console.log(response)

            }

        });
    }

    function generateHtmlCode(childrenInfo) {
        let childrenHtmlCode = "";
        $.each(childrenInfo, function (key, value) {

            childrenHtmlCode += "<tr id=\"children-info-serial-no-" + value.serial_no + "\">\n" +
                "                            <td><input type=\"text\" name=\"serial_no[]\" class=\"form-control serial-no\" value=\"" + value.serial_no + "\"/></td>\n" +
                "                            <td><input type=\"text\" name=\"children_name[]\" class=\"form-control\" value=\"" + value.name + "\"/></td>\n" +
                "                            <td>\n" +
                "                                <div class=\"form-check-inline\">\n" +
                "                                    <label class=\"form-check-label\">\n" +
                "                                        <input type=\"radio\" class=\"form-check-input\" name=\"children_gender[" + key + "]\"  " + (value.gender === "m" ? "checked" : "") + "  value=\"m\"> Male\n" +
                "                                    </label>\n" +
                "                                </div>\n" +
                "                                <div class=\"form-check-inline\">\n" +
                "                                    <label class=\"form-check-label\">\n" +
                "                                        <input type=\"radio\" class=\"form-check-input\" name=\"children_gender[" + key + "]\" " + (value.gender === "f" ? "checked" : "") + " value=\"f\"> Female\n" +
                "                                    </label>\n" +
                "                                </div>\n" +
                "                            </td>\n" +
                "                            <td><input type=\"text\" name=\"children_age[]\" class=\"form-control\" value=\"" + value.age + "\"/></td>\n" +
                "                            <td class=\"text-center\">\n" +
                "                                <button type=\"button\" children-info-serial-no=\"" + value.serial_no + "\" children-info-id=\"" + value.id + "\"\n" +
                "                                        class=\"btn btn-sm btn-danger children-info-del-btn\">\n" +
                "                                    <i class=\"fa fa-times-circle\"></i>\n" +
                "                                </button>\n" +
                "                            </td>\n" +
                "                            \n" +
                "                        </tr>";
        })
        return childrenHtmlCode;

    }


    //Delete
    childrenInfoContainer.on('click', onclickDeleteBtnSelector, function () {
        let id = $(this).attr('children-info-id');
        let serialNo = $(this).attr('children-info-serial-no');
        $("#children-info-serial-no-" + serialNo).remove();

        if (id !== "#") {
            $.ajax({
                type: 'DELETE',
                url: "childreninfo/delete/" + id,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    setActivePreloaderBtn(maritalStatusInfoBtnText, maritalStatusInfoBtnPreloader);
                },
                complete: function () {
                    setDeactivePreloaderBtn(maritalStatusInfoBtnText, maritalStatusInfoBtnPreloader);
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

