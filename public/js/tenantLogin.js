$(document).ready(function() {

    $('#tenantNameSubmit').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("submitForm"));

            $.ajax({
                type: "POST",
                url: "/api/checkTenant/",
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
                        $('#exampleModal').modal('hide');
                        document.getElementById("tenant").textContent = data.data;
                        $("#tenantInput").val(data.data);

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

    $('#loginHost').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("loginHostForm"));

            $.ajax({
                type: "POST",
                url: "/api/loginHost/",
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
                        window.location.href = "/dashboardHost";

                    }


                });
            });

        });
    });
})