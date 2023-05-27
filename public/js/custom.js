$(document).ready(function () {
    $('#refresh-captcha').click(function () {

        $.ajax({
            type: 'GET',
            url: 'refresh-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
});