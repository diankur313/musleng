$(document).ready(function () {
    let scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });
    var _token = {
        '_token': $('input[name="_token"]').val(),
    };
    var success = document.createElement('audio');
    var error = document.createElement('audio');
    success.setAttribute('src', 'plugin/beep-07.mp3');
    error.setAttribute('src', 'plugin/beep-05.mp3');

    scanner.addListener('scan', function (content) {
        $("#id_scan").val(content),
            $.ajax({
                method: 'POST',
                data: _token,
                url: "barcode-scan=" + content,
                success: function (data) {
                    success.play();
                    Swal.fire({
                        icon: 'success',
                        title: data.nama,
                        text: data.bidang,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $.ajax({
                        method: 'GET',
                        url: "check-scan",
                        success: function (data) {
                            $("#scanned").empty();
                            $("#scanned").html('<p>' + data[0] + '</p>')
                            $("#this_session").empty();
                            $("#this_session").html('<i class="ti-user"></i>' + data[1])
                        }
                    })
                },
                statusCode: {
                    401: function (message) {
                        error.play();
                        Swal.fire({
                            icon: 'error',
                            title: 'Expired Session',
                            text: 'Your session has expired',
                            showConfirmButton: true,
                            timer: 5000
                        });
                    },
                    402: function () {
                        error.play();
                        Swal.fire({
                            icon: 'error',
                            title: 'Not Found',
                            text: 'Your identity not found in database',
                            showConfirmButton: true,
                            timer: 5000
                        });
                    }
                },
            });
    });
    $.ajax({
        method: 'POST',
        data: _token,
        url: "change-camera",
        success: function (data) {
            Instascan.Camera.getCameras().then(function (cameras) {
                $("#camera_length").val(cameras.length);
                if (cameras.length > 0) {
                    scanner.start(cameras[data]);
                    $("#change_camera").empty();
                    $("#active_camera").val(data);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        }, error: function () {
            $("#camera_length").val(cameras.length);
        }
    });
});