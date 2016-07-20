/**
 * Created by MVMCJ on 03/07/20
 */


function UploadImage() {

}

$(document).ready(function () {
    $('#profileImage').dimmer({
        on: 'hover'
    });

    $('#imageForm').on('submit', (function (e) {

    }));

    $('#file').on('change', function (e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('arquivo', $('#file')[0].files[0]);

        $('body').dimmer('show');

        $.ajax({
            type: 'POST',
            url: "../api/fileUpload.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('body').dimmer('hide');
                alert(data);
            },
            error: function (data) {
                console.log("error");
                console.log(data);
            }
        });
    });
});