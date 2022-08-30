$(document).ready(function() {

    $('#register').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("form-register"));

            $.ajax({
                type: "POST",
                url: "/saveRegisterTenant",
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
                        window.location.href = "/loginTenant";

                    }


                });
            });

        });
    });

    $('#login').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("loginForm"));

            $.ajax({
                type: "POST",
                url: "/api/login/",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });
})