$(document).ready(function () {
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#profileForm").submit(function (e) {
        e.preventDefault();
        var $form = $(this);

        // check if the input is valid
        if (!$form.valid()) return false;

        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("profileForm"));

            $.ajax({
                type: "POST",
                url: "/addProfile",
                data: data,
                dataType: "json",

                processData: false,
                contentType: false,
            }).then(function (data) {
                console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function () {
                    if (data.type == "error") {
                    } else {
                        // window.location.href = "/dashboardTenant";
                        $("#user_id").val(data.data.user_id);
                        $("#user_id1").val(data.data.user_id);
                    }
                });
            });
        });
    });
});
