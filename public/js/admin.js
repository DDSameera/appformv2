$(document).ready(function () {
    //Set CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#delete-user").click(function () {

        $(".user-ids:checked").each(function () {

            var userId = $(this).val();

            $.ajax({
                type: 'DELETE',
                url: "/wizard/basicinfo/delete/" + userId,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {

                },
                complete: function () {

                },
                success: function (response) {
                    location.reload();
                },
                error: function (response) {
                    console.log(response);

                }

            });
        });
    });

});