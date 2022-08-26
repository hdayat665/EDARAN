$(document).ready(function() {
    var elm = document.getElementById("switchery-default");
    var switchery = new Switchery(elm, {
        color: "#00acac",
    });
    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    $("#datepicker-birth").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $('#profileForm').submit(function(e) {
        e.preventDefault();
        var $form = $(this);

        // check if the input is valid
        if (!$form.valid()) return false;

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("profileForm"));

            $.ajax({
                type: "POST",
                url: "/addProfile",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/dashboardTenant";
                        $('#user_id').val(data.data.user_id);
                        $('#user_id1').val(data.data.user_id);

                    }


                });
            });

        });
    });

    $('#submitAddress').click(function(e) {


        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addressForm"));

            $.ajax({
                type: "POST",
                url: "/addAddress",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/dashboardTenant";
                        // $('#user_id').val(data.data.user_id);
                        // $('#user_id1').val(data.data.user_id);

                    }


                });
            });

        });
    });

    $('#submitEmployment').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("employmentForm"));

            $.ajax({
                type: "POST",
                url: "/addEmployment",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/dashboardTenant";
                        // $('#user_id').val(data.data.user_id);
                        // $('#user_id1').val(data.data.user_id);

                    }


                });
            });

        });
    });
});