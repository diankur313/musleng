$(document).ready(function () {
    $(".status").on('click', function () {
        var id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }),
            $.ajax({
                type: "POST",
                url: "update-session/" + id,
                success: function (data) {
                    $("#append_row").empty();
                    $("#append_row").html(data);
                    huba();
                    $.notify({
                        message: "<h4>Active session has changed</h4>"
                    }, {
                        type: 'info',
                        delay: 1000,
                    })
                }
            })
    })
})

function huba() {
    $(".status").on('click', function () {
        var id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }),
            $.ajax({
                type: "POST",
                url: "update-session/" + id,
                success: function (data) {
                    $("#append_row").empty();
                    $("#append_row").html(data);
                    huba();
                    $.notify({
                        message: "<h4>Active session has changed</h4>"
                    }, {
                        type: 'info',
                        delay: 1000,
                    })
                }
            })
    })
}